<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model //Thể loại
{
    protected $table ='category';
	protected $guarded =[];
	
	public function products()
	{
	    //Quan hệ một-nhiều (hasMany): 1-n một thể loại(category) có nhiều posts lên (nhiều sản phẩm_product)
		return $this->hasMany('App\Products','cat_id');
	}
	public function news()
	{
		return $this->hasMany('App\News','cat_id');
	}
}
