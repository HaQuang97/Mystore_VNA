<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

use PayPal\Api\ExecutePayment;

use PayPal\Api\PaymentExecution;


use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

use Cart,Auth,DateTime;
use App\Oders;
use App\Oders_detail;
class PayMentController extends Controller
{    
    private $apiContext;

    public function __construct()
    {
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                config('paypal.client_id'),
                config('paypal.secret')
            )
        );
        $this->apiContext->setConfig(config('paypal.settings'));
    }

    public function index()
    {

    }

    public function create(Request $rq)
    {
        $payment_id = Session::get('payment_id');
        Session::forget('payment_id');

        $execution = new PaymentExecution();
        $execution->setPayerId($_GET['PayerID']);
        $payment = payment::get($payment_id,$this->apiContext);

        try {
            $result = $payment->execute($execution,$this->apiContext);
            if ($result->getState() =='approved') 
            {
                $oder = new Oders();
                $total =0;
                foreach (Cart::content() as $row) {
                    $total = $total + ( $row->qty * $row->price);
                }
                $oder->c_id = Auth::user()->id;
                $oder->qty = Cart::count();
                $oder->sub_total = floatval($total);
                $oder->total =  floatval($total);
                $oder->status = 1;
                $oder->type = 'paypal';
                $oder->note = $result->id;
                $oder->created_at = new datetime;
                $oder->save();
                $o_id =$oder->id;

                foreach (Cart::content() as $row) {
                   $detail = new Oders_detail();
                   $detail->pro_id = $row->id;
                   $detail->qty = $row->qty;
                   $detail->o_id = $o_id;
                   $detail->created_at = new datetime;
                   $detail->save();
                } 
            Cart::destroy();   
            return redirect()->route('getcart')
            ->with(['flash_level'=>'result_msg','flash_massage'=>'Thanh toán đơn hàng thành công !']);     
            } else {
                return redirect()->route('getcart')
                ->with(['flash_level'=>'result_msg','flash_massage'=>' Thanh toán thất bại !']);  
            }
        } catch (Exception $e) {
            return redirect()->route('getcart')
                ->with(['flash_level'=>'result_msg','flash_massage'=>'Rất tiếc đã xảy ra lỗi trong quá trình thanh toán !']);
        }
    }

    public function store(Request $request)
    {
        // Người thanh toán
         // Tài nguyên đại diện cho Người thanh toán để thanh toán một khoản thanh toán
         // Đối với thanh toán bằng tài khoản paypal, hãy đặt phương thức thanh toán
        //để 'paypal'.
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        // Số tiền
        // Cho phép bạn chỉ định số tiền thanh toán.
        //Bạn cũng có thể chỉ định chi tiết bổ sung
        //chẳng hạn như vận chuyển, thuế.
        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal(Cart::subtotal()/21000);
            // ->setDetails($details);
        //Giao dịch
        // Giao dịch xác định hợp đồng
        // thanh toán - thanh toán cho ai và
        // đang thực hiện nó.
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());
        // ### Các url chuyển hướng
//         Đặt url mà người mua phải được chuyển hướng đến sau
//        phê duyệt / hủy thanh toán.
//          $ baseUrl = getBaseUrl ();
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('payment.create'))
            ->setCancelUrl(route('payment.create'));
        // ### Payment
        // A Payment Resource; create one using
        // the above types and intent set to 'sale'
        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));
        // Chỉ cho mục đích mẫu.
//           $ request = clone $ payment;
//          ### Tạo thanh toán
//          Tạo thanh toán bằng cách gọi phương thức 'create'
//          chuyển nó thành apiContext hợp lệ.
//          (Xem bootstrap.php để biết thêm về `ApiContext`)
//          Đối tượng trả về chứa trạng thái và
//          url mà người mua phải được chuyển hướng đến
//          để phê duyệt thanh toán

        try {
            $payment->create($this->apiContext);
        } catch (Exception $ex) {
            echo 'that bai';
            exit(1);
        }
        // ### Nhận url chuyển hướng
        //Phản hồi API cung cấp url mà bạn phải chuyển hướng người mua. Truy lục url từ $ payment-> getApprovalLink ()
//          phương pháp
        $approvalUrl = $payment->getApprovalLink();
        Session::put('payment_id', $payment->id);

        return redirect($approvalUrl);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
