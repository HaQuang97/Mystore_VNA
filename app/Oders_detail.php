<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oders_detail extends Model //chi tiết đơn đặt hàng (chi tiết hóa đơn)
{
    protected $table ='oders_detail';
	protected $guarded =[];

	 public function oders()
    {
        //Relationship...belongsTo là phương thức nghịch đảo của hasOne.
        //foreignkey trên Order_detail không phải là o_id thì cần truyền thêm đối số thứ 2 là o_id
        //Quan hệ nhiều-một (belongsTo): n-1 nhiều chi tiết đơn đặt hàng sẽ được posts lên thuộc về một đơn đặt hàng
        return $this->belongsTo('App\Oders','o_id');
    }

    public function products()
    {
        //quan hệ 1-1 giữa 2 bảng : thể hiện 1 chi tiết đơn đặt hàng sẽ thuộc về 1 sản phẩm
        return $this->hasOne('App\Products','pro_id');
    }
}
