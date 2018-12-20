<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table ='news';
	protected $guarded =[];

	public function category()
	{
        //Relationship...belongsTo là phương thức nghịch đảo của hasOne.
        //foreignkey trên News không phải là cat_id thì cần truyền thêm đối số thứ 2 là pro_id để làm foreignkey giữa 2 bảng
        //Quan hệ nhiều-một (belongsTo): n-1 nhiều tin tức được posts lên thuộc về một thể loại
		return $this->belongsTo('App\Category','cat_id');
	}
}
