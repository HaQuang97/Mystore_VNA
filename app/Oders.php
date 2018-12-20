<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oders extends Model //dặt hàng (hóa đơn)
{
    protected $table ='oders';
	protected $guarded =[];

	public function user()
    {
        //Relationship...belongsTo là phương thức nghịch đảo của hasOne.
        //foreignkey trên Order không phải là user_id thì cần truyền thêm đối số thứ 2 giả sử đặt là c_id = user_id
        //Quan hệ nhiều-một (belongsTo): n-1 nhiều lần đặt hàng được posts lên thuộc về một user
        return $this->belongsTo('App\User','c_id');
    }
    public function oders_detail()
	{
	    //Quan hệ một-nhiều (hasMany): 1-n một đơn đặt hàng có thể chứa nhiều lần đặt hàng của user đối vs các sản phẩm khác nhau
		return $this->hasMany('App\Oders_detail','o_id');
	}
}
