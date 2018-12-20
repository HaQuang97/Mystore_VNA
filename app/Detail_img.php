<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_img extends Model // chi tiết hình ảnh
{
   	protected $table ='detail_img';
	protected $guarded =[];   //Mảng bảo vệ ảnh

	public function products()
    {
        //Relationship...belongsTo là phương thức nghịch đảo của hasOne.
        //foreignkey trên detail-img không phải là pro_id thì cần truyền thêm đối số thứ 2 là pro_id
        //Quan hệ nhiều-một (belongsTo): n-1 nhiều ảnh được posts lên thuộc về một sản phẩm
        return $this->belongsTo('App\Products','pro_id');
    }
}
