<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddProductsRequest;
use App\Http\Requests\EditProductsRequest;
use App\Http\Requests;
use App\Products;
use App\Category;
use App\Pro_details;
use App\Detail_img;
use Auth;
use DateTime,File,Input,DB;


class ProductsController extends Controller
{
	public function getlist($id)
	{
        if ($id!='all') {
            $pro = Products::where('cat_id',$id)->paginate(10);
            $cat= Category::all();
            return view('back-end.products.list',['data'=>$pro,'cat'=>$cat,'loai'=>$id]);                    
        } else {
            $pro = Products::paginate(10);
            $cat= Category::all();
            return view('back-end.products.list',['data'=>$pro,'cat'=>$cat,'loai'=>0]);
        }		
	}
    public function getadd($id)
    {
        $loai = Category::where('id',$id)->first();
        $p_id = $loai->parent_id;
        $p_name = Category::where('id',$p_id)->first();
		$cat= Category::where('parent_id',$p_id)->get();
		$pro = Products::all();	
        if ($p_id >=5) {
            return view('back-end.products.add',['data'=>$pro,'cat'=>$cat,'loai'=>$p_name->name]);
        }
        else {
            return view('back-end.products.sachLapTrinh-add',['data'=>$pro,'cat'=>$cat,'loai'=>$p_name->name]);
        }
		
		
    }
    public function postadd(AddProductsRequest $rq)
    {
    	$pro = new Products();

    	$pro->name = $rq->txtname;
    	$pro->slug = str_slug($rq->txtname,'-');
    	$pro->note = $rq->txtnote;
    	$pro->intro = $rq->txtintro;
    	$pro->price = $rq->txtprice;
    	$pro->cat_id = $rq->sltCate;
    	$pro->created_at = new datetime;
    	$pro->status = '1';
    	$f = $rq->file('txtimg')->getClientOriginalName();
    	$filename = time().'_'.$f;
    	$pro->images = $filename;    	
    	$rq->file('txtimg')->move('public/uploads/products/',$filename);
    	$pro->save();    	
    	$pro_id =$pro->id;

    	$detail = new Pro_details();

    	$detail->name = $rq->txtName;
     	$detail->author = $rq->txtauthor;
    	$detail->pub_company = $rq->txtpub;
        $detail->note = $rq->txtNote;
    	$detail->pro_id = $pro_id;
    	$detail->created_at = new datetime;
    	$detail->save();    	

    	if ($rq->hasFile('txtdetail_img')) {
    		$df = $rq->file('txtdetail_img');
    		foreach ($df as $row) {
    			$img_detail = new Detail_img();
    			if (isset($row)) {
    				$name_img= time().'_'.$row->getClientOriginalName();
    				$img_detail->images_url = $name_img;
    				$img_detail->pro_id = $pro_id;
    				$img_detail->created_at = new datetime;
    				$row->move('uploads/products/details/',$name_img);
    				$img_detail->save();
    			}
    		}
		}
	return redirect('admin/sanpham/all')
      ->with(['flash_level'=>'result_msg','flash_massage'=>' Đã thêm thành công !']);

    }
    public function getdel($id)
    {
        $detail = Detail_img::where('pro_id',$id)->get();
        foreach ($detail as $row) {                
               $dt = Detail_img::find($row->id);
               $pt = public_path('uploads/products/details/').$dt->images_url;
               // dd($pt);   
                if (file_exists($pt))
                {
                    unlink($pt);
                }
               $dt->delete();                              
            }
    	$pro = Products::find($id);
        $pro->delete();
        return redirect('admin/sanpham/all')
         ->with(['flash_level'=>'result_msg','flash_massage'=>'Đã xóa !']);
    }
    public function getedit($loai,$id) {
        $dt = Products::where('id',$id)->first();
        $c_id= $dt->cat_id;
        $loai= Category::where('id',$c_id)->first();
        $p_id = $loai->parent_id;

    	if ($p_id == 1) {
            $cat= Category::where('parent_id', 1)->get();
            $pro = Products::where('id',$id)->first();
            return view('back-end.products.edit-sachGD',['pro'=>$pro,'cat'=>$cat,'loai'=>'Sách Giáo Dục']);
        } elseif ($p_id ==2) {
            $cat= Category::where('parent_id', 2)->get();
            $pro = Products::where('id',$id)->first();
            return view('back-end.products.edit-sachGD',['pro'=>$pro,'cat'=>$cat,'loai'=>'Sách Ngoại Ngữ']);
        } elseif ($p_id ==3) {
            $cat= Category::where('parent_id', 3)->get();
            $pro = Products::where('id',$id)->first();
            return view('back-end.products.edit-sachGD',['pro'=>$pro,'cat'=>$cat,'loai'=>'Sách Lập Trình']);
        }
    }
    public function postedit($loai,$id,EditProductsRequest $rq)
    {
    	$pro = Products::find($id);

        $pro->name = $rq->txtname;
        $pro->slug = str_slug($rq->txtname,'-');
        $pro->note = $rq->txtnote;
        $pro->intro = $rq->txtintro;
        $pro->price = $rq->txtprice;
        $pro->cat_id = $rq->sltCate;
        $pro->updated_at = new datetime;
        $pro->status = '1';
        $file_path = public_path('uploads/products/').$pro->images;
        if ($rq->hasFile('txtimg')) {
            if (file_exists($file_path))
                {
                    unlink($file_path);
                }
            
            $f = $rq->file('txtimg')->getClientOriginalName();
            $filename = time().'_'.$f;
            $pro->images = $filename;       
            $rq->file('txtimg')->move('uploads/products/',$filename);
        }       
        $pro->save(); 
        
        $pro->pro_details->name = $rq->txtname;
        $pro->pro_details->author = $rq->txtauthor;
        $pro->pro_details->note = $rq->txtnote;
        $pro->pro_details->pub_company = $rq->txtpub;
        $pro->pro_details->updated_at = new datetime;        

        if ($rq->hasFile('txtdetail_img')) {
            $detail = Detail_img::where('pro_id',$id)->get();
            $df = $rq->file('txtdetail_img');
            foreach ($detail as $row) {                
               $dt = Detail_img::find($row->id);
               $pt = public_path('uploads/products/details/').$dt->images_url;
               // dd($pt);   
                if (file_exists($pt))
                {
                    unlink($pt);
                }
               $dt->delete();                              
            }
            foreach ($df as $row) {
                $img_detail = new Detail_img();
                if (isset($row)) {
                    $name_img= time().'_'.$row->getClientOriginalName();
                    $img_detail->images_url = $name_img;
                    $img_detail->pro_id = $id;
                    $img_detail->created_at = new datetime;
                    $row->move('uploads/products/details/',$name_img);
                    $img_detail->save();
                }
            }
        }
    $pro->pro_details->save();
    return redirect('admin/sanpham/all')
      ->with(['flash_level'=>'result_msg','flash_massage'=>' Đã lưu !']);       
    }
}
