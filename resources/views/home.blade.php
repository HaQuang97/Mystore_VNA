@extends('layouts.master')
@section('content')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">   
        <!-- danh muc sachGD -->
        @foreach($sachGD as $row)
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 no-padding">
            <div class="thumbnail sachGD">
              <div class="bt">
                <div class="image-m pull-left">
                  <img class="img-responsive" src="{!!url('public/uploads/products/'.$row->images)!!}" alt="img responsive">
                </div>
                <div class="intro pull-right">
                  <h1><small class="title-sachGD">{!!$row->name!!}</small></h1>
                  <li>{!!$row->intro!!}</li>
                  <span class="label label-info">Mô tả</span>
                  <li><span class="glyphicon glyphicon-hand-right"></span> {!!$row->name!!}</li>
                  <li><span class="glyphicon glyphicon-hand-right"></span> {!!$row->note!!}</li>
                  <li><span class="glyphicon glyphicon-hand-right"></span> {!!$row->status!!}</li>
                </div><!-- /div introl -->
              </div> <!-- /div bt -->
              <div class="ct">
                <a href="{!!url('sachGD/'.$row->id.'-'.$row->slug)!!}" title="Xem chi tiết">
                  <span class="label label-warning">Mô tả chi tiết</span>
                  <li><strong>Tên</strong> : <i> {!!$row->name!!}</i></li>
                  <li><strong>Tác Giả</strong> : <i>{!!$row->author!!} </i></li>
                  <li><strong>Nhà XB</strong> :<i> {!!$row->pub_company!!}</i></li>
                  <li><strong>Mô Tả</strong> : <i> {!!$row->note!!}</i></li>
                </a>
              </div>
                <span class="btn label-warning">Giá : <strong>{!!$row->price!!}</strong> Đ </span>
                <a href="{!!url('gio-hang/addcart/'.$row->id)!!}" class="btn btn-success pull-right add">Thêm vào giỏ </a>
            </div> <!-- / div thumbnail -->
          </div>  <!-- /div col-4 -->
          @endforeach
          <!-- danh muc sachGD -->
       
          <div class="clearfix">            
          </div>

        <!--========================== phan danh muc sachNgoaiNgu   =========================================  -->
          <div id="sachNgoaiNgu"></div>
          @foreach($sachNgoaiNgu as $row)
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 no-padding" >
            <div class="thumbnail">          
              <div class="hienthi">
                <img class="img-responsive" src="{!!url('public/uploads/products/'.$row->images)!!}" alt="img responsive">
                <div class="caption">
                  <h1><small><strong class="title-pro">{!!$row->name!!}</strong></small></h1>
                  <p>    
                      <li><i>{!!$row->intro!!}</i></li>
                      <span class="label label-info">Mô tả</span>
                      <li><span class="glyphicon glyphicon-hand-right"></span> {!!$row->name!!}</li>
                      <li><span class="glyphicon glyphicon-hand-right"></span> {!!$row->note!!}</li>
                      <li><span class="glyphicon glyphicon-hand-right"></span> {!!$row->status!!}</li>
                  </p>
                  <p>
                    <span class="btn label-warning">Giá : <strong>{!!$row->price!!}</strong> Đ </span>
                  </p>
                </div>
              </div>
              <div class="tomtat">
                <div class="thongtin">
                  <a href="{!!url('sachNgoaiNgu/'.$row->id.'-'.$row->slug)!!}" title="Xem chi tiết">
                    <span class="label label-warning">Mô tả chi tiết</span>
                    <li><strong>Tên</strong> : <i> {!!$row->name!!}</i></li>
                    <li><strong>Tác Giả</strong> : <i>{!!$row->author!!} </i></li>
                    <li><strong>Nhà XB</strong> :<i> {!!$row->pub_company!!}</i></li>
                    <li><strong>Mô Tả</strong> : <i> {!!$row->note!!}</i></li>
                  </a>
                </div>                
                  <div class="price">  
                    <span class="btn btn-info btn-block ">Giá : <strong>{!!$row->price!!}</strong> Đ</span>   
                    <a href="{!!url('gio-hang/addcart/'.$row->id)!!}" class="btn btn-success btn-block">Thêm vào giỏ</a> 
                  </div>                  
              </div> 
            </div>
          </div>
        @endforeach
        <div class="clearfix">
          
        </div>
          <a href="http://api.hostinger.vn/redir/1309904" target="_blank"> 
            <img src="public/images/slides/thumbs/qc6.png" alt="Hosting Miễn Phí" border="0" width="100%" height="250" />
          </a>
<!-- =============== danh muc sachLapTrinh ===================================== -->
        <div id="sachLapTrinh"></div>
        @foreach($sachLapTrinh as $row)
           <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 no-padding">
            <div class="thumbnail sachLapTrinh">
              <div class="bt">
                <div class="image-m pull-left">
                  <img class="img-responsive" src="{!!url('public/uploads/products/'.$row->images)!!}" alt="img responsive">
                </div>
                <div class="intro pull-right">
                  <span class="label label-info">Mô tả</span>
                  <li><span class="glyphicon glyphicon-hand-right"></span> {!!$row->name!!}</li>
                  <li><span class="glyphicon glyphicon-hand-right"></span> {!!$row->note!!}</li>
                  <li><span class="glyphicon glyphicon-hand-right"></span> {!!$row->status!!}</li>
                </div><!-- /div introl -->
              </div> <!-- /div bt -->
              <div class="ct">
                <a href="{!!url('sachLapTrinh/'.$row->id.'-'.$row->slug)!!}" title="Xem chi tiết">
                  <span class="label label-warning">Mô tả chi tiết</span>
                  <li><strong>Tên</strong> : <i> {!!$row->name!!}</i></li>
                  <li><strong>Tác Giả</strong> : <i>{!!$row->author!!} </i></li>
                  <li><strong>Nhà XB</strong> :<i> {!!$row->pub_company!!}</i></li>
                  <li><strong>Mô Tả</strong> : <i> {!!$row->note!!}</i></li>
                </a>
              </div>
                <span class="btn label-warning">Giá : <strong>{!!$row->price!!}</strong> Đ </span>
                <a href="{!!url('gio-hang/addcart/'.$row->id)!!}" class="btn btn-success pull-right add">Thêm vào giỏ </a>
            </div> <!-- / div thumbnail -->
          </div>  <!-- /div col-4 item products -->
        @endforeach      

        </div> <!-- /col 12 -->     
@endsection
