@extends('layouts.new-master')
@section('content')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h3 class="panel-title">
            <span class="glyphicon glyphicon-home"><a href="{!!url('/')!!}" title=""> Home</a></span>
            <span class="glyphicon glyphicon-chevron-right" style="font-size: 11px;"></span><a href="{!!url('/sachGD')!!}" title=""> Sách Giáo Dục</a>
            <span class="glyphicon glyphicon-chevron-right" style="font-size: 11px;"></span> <a href="#" title="">{!!$slug!!}</a>
        </h3>
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 no-padding">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                    <div class="panel panel-success">
                        <div class="panel-body">
                            <div class="row">
                                <!-- hot new content -->
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">
                                    <h3 class="pro-detail-title"><a href="{!!url('/sachGD/'.$data->id.'-'.$data->slug)!!}" title="">{!!$data->name!!}</a></h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                                            <div class="img-box">
                                                <img class="img-responsive img-sachGD" src="{!!url('public/uploads/products/'.$data->images)!!}" alt="img responsive">
                                            </div>
                                            <div class="img-slide">
                                                <div class="panel panel-default text-center">
                                                    <div id="links">
                                                        @foreach($data->detail_img as $row)
                                                            <a href="{!!url('uploads/products/details/'.$row->images_url)!!}" title="{!!$data->name!!}" data-gallery>
                                                                <img src="{!!url('public/uploads/products/details/'.$row->images_url)!!}" alt="{!!$data->name!!}" width="30" height="40">
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <label class="btn btn-large btn-block btn-warning">{!!number_format($data->price)!!} vnd</label>
                                        </div>
                                        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                                            <div class="panel panel-info" style="margin: 0;">
                                                <div class="panel-heading" style="padding:5px;">
                                                    <h3 class="panel-title">Khuyễn mãi - Chính sách</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="khuyenmai">
                                                        <li><span class="glyphicon glyphicon-ok-sign"></span>Giảm Ngay 20% Cho Khách Hàng Mua Sách Có Hóa Đơn Từ 600K Trở Lên </li>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-info">
                                                <div class="panel-body">
                                                    <div class="chinhsach">
                                                        <li><span class="glyphicon glyphicon-hand-right"></span> Sách chính hãng nhà sản xuất</li>
                                                        <li><span class="glyphicon glyphicon-hand-right"></span> Giao hàng tận nơi miễn phí trong 1 ngày</li>
                                                        <li><span class="glyphicon glyphicon-hand-right"></span> Đổi trả sách trong 1 tuần nếu không ưng ý</li>
                                                        <li><span class="glyphicon glyphicon-hand-right"></span> Hoàn trả tiền nếu đổi trả và không mua sách trong 2 ngày đầu</li>
                                                    </div>
                                                </div>
                                            </div>
                                            @if($data->status ==1)
                                                <a href="{!!url('gio-hang/addcart/'.$data->id)!!}" title="" class="btn btn-large btn-block btn-primary" style="font-size: 20px;">Đặt hàng ngay</a>
                                            @else
                                                <a href="" title="" class="btn btn-large btn-block btn-primary disabled" style="font-size: 20px;">Tạm hết hàng</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th colspan="2">GIỚI THIỆU CHI TIẾT SẢN PHẨM: <strong>{!!$slug!!}</strong> </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>Tên Sách</td>
                                                <td>{!!$data->pro_details->name!!}</td>
                                            </tr>
                                            <tr>
                                                <td>Tác Giả</td>
                                                <td>{!!$data->pro_details->author!!}</td>
                                            </tr>
                                            <tr>
                                                <td>Nhà XB</td>
                                                <td>{!!$data->pro_details->pub_company!!}</td>
                                            </tr>
                                            <tr>
                                                <td>Mô Tả </td>
                                                <td>{!!$data->pro_details->note!!}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="img-box">
                                        <img class="img-responsive img-sachGD" src="{!!url('public/uploads/products/'.$data->images)!!}" alt="img responsive">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                                    <h2> <small> Giới thiệu chi tiết sản phẩm</small></h2>
                                    <div class="accordion-group">
                                        <button class="SeeMore btn-primary" data-toggle="collapse" href="#collapseTwo" ><b class="caret"></b> Xem chi tiết</button>
                                        <p>{!!$data->pro_details->details_note!!}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <hr>
                                <h2 style="padding-left: 20px;"><small>Tin tức mới</small></h2>
                                <hr>
                                @include('modules.tin-tuc')
                            </div><!-- /row -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 no-padding">
            <!-- panel inffo 1 -->
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">Sản phẩm tương tự</h3>
                </div>
                <div class="panel-body no-padding">
                    <?php
                    $sachGD =DB::table('products')
                        ->join('category', 'products.cat_id', '=', 'category.id')
                        ->join('pro_details', 'pro_details.pro_id', '=', 'products.id')
                        ->where('category.parent_id','=','1')
                        ->select('products.*','pro_details.name','pro_details.author','pro_details.pub_company','pro_details.note')
                        ->orderBy('products.created_at', 'desc')
                        ->paginate(2);

                    ?>
                    @foreach($sachGD as $row)
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">
                            <div class="thumbnail sachGD">
                                <div class="bt">
                                    <div class="image-m pull-left">
                                        <img class="img-responsive" src="{!!url('public/uploads/products/'.$row->images)!!}" alt="{!!$row->name!!}">
                                    </div>
                                    <div class="intro pull-right">
                                        <h1><small class="title-sachGD">{!!$row->name!!}</small></h1>
                                        <li>{!!$row->intro!!}</li>
                                        <span class="label label-info">Mô tả</span>
                                        @if ($row->note!='')
                                            <li><span class="glyphicon glyphicon-ok-sign"></span>{!!$row->note!!}</li>
                                        @endif
                                        <li><span class="glyphicon glyphicon-ok-sign"></span>Cài đặt phần miềm, tải ứng dụng miến phí</li>
                                    </div><!-- /div introl -->
                                </div> <!-- /div bt -->
                                <div class="ct">
                                    <a href="{!!url('sachGD/'.$row->id.'-'.$row->slug)!!}" title="Chi tiết">
                                        <span class="label label-info">Mô tả</span>
                                        @if ($row->note!='')
                                            <li><span class="glyphicon glyphicon-ok-sign"></span>{!!$row->note!!}</li>
                                        @endif
                                        <li><span class="glyphicon glyphicon-ok-sign"></span>Cài đặt phần miềm, tải ứng dụng miến phí</li>
                                        <span class="label label-warning">Giới thiệu chi tiết</span>
                                        <li><strong>Tên Sách</strong> : <i>  {!!$row->name!!}</i></li>
                                        <li><strong>Tác Giả</strong> : <i>  {!!$row->author!!}</i></li>
                                        <li><strong>Nhà XB</strong> : <i>{!!$row->pub_company!!} </i></li>
                                    </a>
                                </div>
                                <span class="btn label-warning"><strong>{!!number_format($row->price)!!}</strong>Vnd </span>
                                <a href="{!!url('gio-hang/addcart/'.$row->id)!!}" class="btn btn-success pull-right add">Thêm vào giỏ </a>
                            </div> <!-- / div thumbnail -->
                        </div>  <!-- /div col-4 -->
                    @endforeach

                </div>
            </div> <!-- /panel info 2  quản cáo 1          -->

            <!-- panel info 2  quản cáo 1          -->
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">Sự kiện HOT</h3>
                </div>
                <div class="panel-body no-padding">
                    <a href="#" title=""><img src="{!!url('public/images/slides/thumbs/qc1.png')!!}" alt="" width="100%" height="100%"> </a> <br>
                    <a href="#" title=""><img src="{!!url('public/images/slides/thumbs/qc2.png')!!}" alt="" width="100%" height="100%"> </a> <br>
                    <a href="#" title=""><img src="{!!url('public/images/slides/thumbs/qc3.png')!!}" alt="" width="100%" height="100%"> </a>
                    <a href="#" title=""><img src="{!!url('public/images/slides/thumbs/qc4.png')!!}" alt="" width="100%" height="100%"> </a>
                    <a href="#" title=""><img src="{!!url('public/images/slides/thumbs/qc5.png')!!}" alt="" width="100%" height="100%"> </a>
                </div>
            </div> <!-- /panel info 2  quản cáo 1          -->
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Thống kê</h3>
                </div>
                <div class="panel-body">
                    <p>Số bài viết: 124556</p>
                    <p>Số Thành Viên : 12435</p>
                    <p>Số Thành Viên Online: 2435</p>
                    <p>Số Người Đang Xem : 435</p>
                </div>
            </div>
            <!-- /panel info 2  quản cáo 1          -->
            <!-- fan pages myweb -->
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Fans Pages</h3>
                </div>
                <div class="panel-body">
                    Hãy <a href="#" title="">Like</a> facebook của VNA để cập nhật tin mới nhất
                </div>
            </div> <!-- /fan pages myweb -->
        </div>
    </div>
    <!-- ===================================================================================/news ============================== -->
@endsection