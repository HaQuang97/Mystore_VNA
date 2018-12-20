<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model //sản phẩm
{
   	protected $table ='products';
	protected $guarded =[];

	public function category()
	{
	    //Quan hệ n-1 : nhiều sản phẩm có thể thuộc cùng 1 thể loại
		return $this->belongsTo('App\Category','cat_id');
	}
	public function pro_details()
    {
        //Quan hệ 1-1 : 1 sản phẩm sẽ có 1 chi tiết sản phẩm
        return $this->hasOne('App\Pro_details','pro_id');
    }
    public function detail_img()
    {
        //Quan hệ 1-n : 1 sản phẩm có thể có nhiều ảnh chi tiết cho sản phẩm
        return $this->hasMany('App\Detail_img','pro_id');
    }
    public function oders_detail()
    {
        //Quan hệ 1-1 : 1 sản phẩm sẽ có 1 chi tiết đơn đặt hàng
        return $this->hasOne('App\Oders_detail','pro_id');
    }
}
