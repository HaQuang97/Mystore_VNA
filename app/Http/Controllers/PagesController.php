<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Products;
use App\Category;
use App\Pro_detail;
use App\News;
use App\Oders;
use App\Oders_detail;
use DB,Cart,Datetime;

class PagesController extends Controller
{
    public function index()
    {
        // Sách giáo dục
        //sửa lại dữ liệu từ bảng pro_detail
        $sachGD = DB::table('products')
                ->join('category', 'products.cat_id', '=', 'category.id')
                ->join('pro_details', 'pro_details.pro_id', '=', 'products.id')
                ->where('category.parent_id','=','1')
                ->select('products.*','pro_details.name','pro_details.author','pro_details.pub_company','pro_details.note')
                ->paginate(12);
        $sachNgoaiNgu = DB::table('products')
                ->join('category', 'products.cat_id', '=', 'category.id')
                ->join('pro_details', 'pro_details.pro_id', '=', 'products.id')
                ->where('category.parent_id','=','2')
                ->select('products.*','pro_details.name','pro_details.author','pro_details.pub_company','pro_details.note')
                ->paginate(10);
        $sachLapTrinh = DB::table('products')
                ->join('category', 'products.cat_id', '=', 'category.id')
                ->join('pro_details', 'pro_details.pro_id', '=', 'products.id')
                ->where('category.parent_id','=','3')
                ->select('products.*','pro_details.name','pro_details.author','pro_details.pub_company','pro_details.note')
                ->paginate(7);

    	return view('home',['sachGD'=>$sachGD,'sachNgoaiNgu'=>$sachNgoaiNgu,'sachLapTrinh'=>$sachLapTrinh]);
    }
    public function addcart($id)
    {
        $pro = Products::where('id',$id)->first();
        Cart::add(['id' => $pro->id, 'name' => $pro->name, 'qty' => 1, 'price' => $pro->price,'options' => ['img' => $pro->images]]);
        return redirect()->route('getcart');
    }

    public function getupdatecart($id,$qty,$dk)
    {
      if ($dk=='up') {
         $qt = $qty+1;
         Cart::update($id, $qt);
         return redirect()->route('getcart');
      } elseif ($dk=='down') {
         $qt = $qty-1;
         Cart::update($id, $qt);
         return redirect()->route('getcart');
      } else {
         return redirect()->route('getcart');
      }
    }
    public function getdeletecart($id)
    {
     Cart::remove($id);
     return redirect()->route('getcart');
    }
    public function xoa()
    {
        Cart::destroy();   
        return redirect()->route('index');   
    }
    public function getcart()
    {   
    	return view ('detail.card')
        ->with('slug','Chi tiết đơn hàng');
    }
    public function getoder()
    {
        if (Auth::guest()) {
            return redirect('login');
        } else {

            return view ('detail.oder')
            ->with('slug','Xác nhận');
        }        
    }
    public function postoder(Request $rq)
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
        $oder->note = $rq->txtnote;
        $oder->status = 0;
        $oder->type = 'cod';
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
        ->with(['flash_level'=>'result_msg','flash_massage'=>' Đơn hàng của bạn đã được gửi đi !']);    
        
    }
    public function getcate($cat)
    {
    	if ($cat == 'sachGD'){
            $sachGD =DB::table('products')
                ->join('category', 'products.cat_id', '=', 'category.id')
                ->join('pro_details', 'pro_details.pro_id', '=', 'products.id')
                ->where('category.parent_id','=','1')
                ->select('products.*','pro_details.name','pro_details.author','pro_details.pub_company','pro_details.note')
                ->paginate(12);
    		return view('category.sachGD',['data'=>$sachGD]);
    	} 
        elseif ($cat == 'sachNgoaiNgu'){
            $sachNgoaiNgu=DB::table('products')
                ->join('category', 'products.cat_id', '=', 'category.id')
                ->join('pro_details', 'pro_details.pro_id', '=', 'products.id')
                ->where('category.parent_id','=','2')
                ->select('products.*','pro_details.name','pro_details.author','pro_details.pub_company','pro_details.note')
                ->paginate(10);
            return view('category.sachNgoaiNgu',['data'=>$sachNgoaiNgu]);
        }
        elseif ($cat == 'sachLapTrinh') {

        $sachLapTrinh = DB::table('products')
                ->join('category', 'products.cat_id', '=', 'category.id')
                ->join('pro_details', 'pro_details.pro_id', '=', 'products.id')
                ->where('category.parent_id','=','19')
                ->select('products.*','pro_details.name','pro_details.author','pro_details.pub_company','pro_details.note')
                ->paginate(8);
            return view('category.sachLapTrinh',['data'=>$sachLapTrinh]);
        }
        elseif ($cat == 'tin-tuc') {
             $new =  DB::table('news')
                    ->orderBy('created_at', 'desc')
                    ->paginate(3);
             $top1 = $new->shift();
             $all =  DB::table('news')
                    ->orderBy('created_at', 'desc')
                    ->paginate(5);
            return view('category.news',['data'=>$new,'hot1'=>$top1,'all'=>$all]);
        }
    }
    public function detail($cat,$id,$slug)
    {
        if ($cat =='tin-tuc') {
            $new = News::where('id',$id)->first();
            return view('detail.news',['data'=>$new,'slug'=>$slug]);
        } elseif ($cat =='sachGD') {
            $sachGD = Products::where('id',$id)->first();
            if (empty($sachGD)) {
                return view ('errors.503');
                } else {
                   return view ('detail.sachGD',['data'=>$sachGD,'slug'=>$slug]);
               }
        }
        elseif ($cat =='sachNgoaiNgu') {
            $sachNgoaiNgu = Products::where('id',$id)->first();
            if (empty($sachNgoaiNgu)) {
            return redirect()->route('index');
            } else {
           return view ('detail.sachNgoaiNgu',['data'=>$sachNgoaiNgu,'slug'=>$slug]);
            }
        }
        elseif ($cat =='sachLapTrinh') {
            $sachLapTrinh = Products::where('id',$id)->first();
            if (empty($sachLapTrinh)) {
                return redirect()->route('index');
            } else {
                return view ('detail.sachLapTrinh',['data'=>$sachLapTrinh,'slug'=>$slug]);
            }
        }
        else {
            return redirect()->route('index');
        }
    }
}
