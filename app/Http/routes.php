<?php

Route::auth();
Route::get('/user', 'HomeController@index');
Route::get('/user/edit', 'HomeController@edit');

// admin route 
Route::get('admin/login', ['as'  => 'getlogin', 'uses' =>'Admin\AuthController@showLoginForm']);
Route::post('admin/login', ['as'  => 'postlogin', 'uses' =>'Admin\AuthController@login']);
Route::get('admin/password/reset', ['as'  => 'getreser', 'uses' =>'Admin\AuthController@email']);

Route::get('admin/logout', ['as'  => 'getlogin', 'uses' =>'Admin\AuthController@logout']);

Route::get('/', ['as'  => 'index', 'uses' =>'PagesController@index']);
// cart - oder
Route::get('gio-hang', ['as'  => 'getcart', 'uses' =>'PagesController@getcart']);
// them vao gio hang
Route::get('gio-hang/addcart/{id}', ['as'  => 'getcartadd', 'uses' =>'PagesController@addcart']);
Route::get('gio-hang/update/{id}/{qty}-{dk}', ['as'  => 'getupdatecart', 'uses' =>'PagesController@getupdatecart']);
Route::get('gio-hang/delete/{id}', ['as'  => 'getdeletecart', 'uses' =>'PagesController@getdeletecart']);
Route::get('gio-hang/xoa', ['as'  => 'getempty', 'uses' =>'PagesController@xoa']);

// tien hanh dat hang
Route::get('dat-hang', ['as'  => 'getoder', 'uses' =>'PagesController@getoder']);
Route::post('dat-hang', ['as'  => 'postoder', 'uses' =>'PagesController@postoder']);
// category
Route::get('/{cat}', ['as'  => 'getcate', 'uses' =>'PagesController@getcate']);
Route::get('/{cat}/{id}-{slug}', ['as'  => 'getdetail', 'uses' =>'PagesController@detail']);

Route::resource('payment', 'PayMentController');

// --------------------------------cac cong viec trong admin (back-end)--------------------------------------- 
//middleware là một bộ lọc, request phải qua bộ lọc này kiểm tra-xử lý gì đó trước khi được gởi tới phần code
// mà bạn khai báo trong route hay controller actions.
Route::group(['middleware' => 'admin'], function () {
        //Prefix có thể dùng để đặt tiền tố cho một nhóm URI mong muốn.
        // Ví dụ, có thể bạn sẽ muốn gom nhóm tất cả các route của trang quản lý website với tiền tố “admin”:
      Route::group(['prefix' => 'admin'], function() {
          //admin bắt buộc phải đăng nhập mới được quyền vào backend
        
       	Route::get('/home', function() {         
         return view('back-end.home');       	
       });
       // -------------------- quan ly danh muc----------------------
          //URL sẽ là: admin/danhmuc
       	Route::group(['prefix' => 'danhmuc'], function() {
            //URL sẽ là: admin/danhmuc/add
           Route::get('add',['as'        =>'getaddcat','uses' => 'CategoryController@getadd']);
           Route::post('add',['as'       =>'postaddcat','uses' => 'CategoryController@postadd']);

           Route::get('/',['as'       =>'getcat','uses' => 'CategoryController@getlist']);
           //Where() để kiểm tra định dạng của tham số được truyền vào
            //URL sẽ là: admin/danhmuc/del/{id}
           Route::get('del/{id}',['as'   =>'getdellcat','uses' => 'CategoryController@getdel'])->where('id','[0-9]+');
           // Xem tham số ở vị trí này là id, nhận giá trị là các số
            //URL sẽ là: admin/danhmuc/edit/{id}
           Route::get('edit/{id}',['as'  =>'geteditcat','uses' => 'CategoryController@getedit'])->where('id','[0-9]+');
           Route::post('edit/{id}',['as' =>'posteditcat','uses' => 'CategoryController@postedit'])->where('id','[0-9]+');
    	});
         // -------------------- quan ly danh muc--------------------
          //URL sẽ là: admin/sanpham
        Route::group(['prefix' => '/sanpham'], function() {
           Route::get('/{loai}/add',['as'        =>'getaddpro','uses' => 'ProductsController@getadd']);
           Route::post('/{loai}/add',['as'       =>'postaddpro','uses' => 'ProductsController@postadd']);

           Route::get('/{loai}',['as'       =>'getpro','uses' => 'ProductsController@getlist']);
           Route::get('/del/{id}',['as'   =>'getdellpro','uses' => 'ProductsController@getdel'])->where('id','[0-9]+');
           
           Route::get('/{loai}/edit/{id}',['as'  =>'geteditpro','uses' => 'ProductsController@getedit'])->where('id','[0-9]+');
           Route::post('/{loai}/edit/{id}',['as' =>'posteditpro','uses' => 'ProductsController@postedit'])->where('id','[0-9]+');
      });
       // -------------------- quan ly danh muc-----------------------------
        Route::group(['prefix' => '/news'], function() {
           Route::get('/add',['as'        =>'getaddnews','uses' => 'NewsController@getadd']);
           Route::post('/add',['as'       =>'postaddnews','uses' => 'NewsController@postadd']);

           Route::get('/',['as'       =>'getnews','uses' => 'NewsController@getlist']);
           Route::get('/del/{id}',['as'   =>'getdellnews','uses' => 'NewsController@getdel'])->where('id','[0-9]+');
           
           Route::get('/edit/{id}',['as'  =>'geteditnews','uses' => 'NewsController@getedit'])->where('id','[0-9]+');
           Route::post('/edit/{id}',['as' =>'posteditnews','uses' => 'NewsController@postedit'])->where('id','[0-9]+');
      });
        // -------------------- quan ly đơn đặt hàng--------------------
        Route::group(['prefix' => '/donhang'], function() {;

           Route::get('',['as'       =>'getpro','uses' => 'OdersController@getlist']);
           Route::get('/del/{id}',['as'   =>'getdeloder','uses' => 'OdersController@getdel'])->where('id','[0-9]+');
           
           Route::get('/detail/{id}',['as'  =>'getdetail','uses' => 'OdersController@getdetail'])->where('id','[0-9]+');
           Route::post('/detail/{id}',['as' =>'postdetail','uses' => 'OdersController@postdetail'])->where('id','[0-9]+');
      });
        // -------------------- quan ly thong tin khach hang--------------------
        Route::group(['prefix' => '/khachhang'], function() {;

           Route::get('',['as'       =>'getmem','uses' => 'UsersController@getlist']);
           Route::get('/del/{id}',['as'   =>'getdelmem','uses' => 'UsersController@getdel'])->where('id','[0-9]+');
           
           Route::get('/edit/{id}',['as'  =>'geteditmem','uses' => 'UsersController@getedit'])->where('id','[0-9]+');
           Route::post('/edit/{id}',['as' =>'posteditmem','uses' => 'UsersController@postedit'])->where('id','[0-9]+');
      });
       // -------------------- quan ly thong nhan vien--------------------
        Route::group(['prefix' => '/nhanvien'], function() {;

           Route::get('',['as'       =>'getnv','uses' => 'Admin_usersController@getlist']);
           Route::get('/del/{id}',['as'   =>'getdelnv','uses' => 'Admin_usersController@getdel'])->where('id','[0-9]+');
           
           Route::get('/edit/{id}',['as'  =>'geteditnv','uses' => 'Admin_usersController@getedit'])->where('id','[0-9]+');
           Route::post('/edit/{id}',['as' =>'posteditnv','uses' => 'Admin_usersController@postedit'])->where('id','[0-9]+');
      });
      // ---------------van de khac ----------------------
    });     
});