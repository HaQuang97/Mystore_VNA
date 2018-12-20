<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin_users extends Authenticatable
{
   //Các thuộc tính được gán giá trị
    protected $fillable = [
        'name', 'email', 'password','level',
    ];

    //Các thuộc tính cần được ẩn đi
    protected $hidden = [
        'password', 'remember_token',
    ];
}
