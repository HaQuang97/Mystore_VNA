@extends('layouts.new-master')
@section('content')
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
 <!-- ====================================== /loc ket qua theo lua chon================================= -->
        <!--================================= phan danh muc sachNgoaiNgu   =========================================  -->
          <div id="sachNgoaiNgu"></div>
        @foreach($data as $row)
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 no-padding" >
            <div class="thumbnail">          
              <div class="hienthi">
                <img class="img-responsive" src="{!!url('public/uploads/products/'.$row->images)!!}" alt="{!!$row->name!!}">
                <div class="caption">
                  <h1><small><strong class="title-pro">{!!$row->name!!}</strong></small></h1>
                  <p>
                      <li><i>{!!$row->intro!!}</i></li>

                      <span class="label label-info ">Sách Ngoại Ngữ</span>
                      @if ($row->name!='')
                        <li><span class="glyphicon glyphicon-ok-sign"></span>{!!$row->name!!}</li>
                      @elseif($row->note!='')
                        <li><span class="glyphicon glyphicon-ok-sign"></span>{!!$row->note!!}</li>
                        @endif
                        <li><span class="glyphicon glyphicon-ok-sign"></span>Cài đặt App để mua sách online trên VNA </li>
                  </p>
                  <p>
                    <span class="btn label-warning"><strong>{!!number_format($row->price)!!} Vnd</strong> </span>
                  </p>
                </div>
              </div>
              <div class="tomtat">
                <div class="thongtin">
                  <a href="{!!url('sachNgoaiNgu/'.$row->id.'-'.$row->slug)!!}" title="">
                  <span class="label label-info ">Ưu đãi khi mua</span>
                      @if ($row->name!='')
                          <li><span class="glyphicon glyphicon-ok-sign"></span>{!!$row->name!!}</li>
                      @elseif($row->note!='')
                          <li><span class="glyphicon glyphicon-ok-sign"></span>{!!$row->note!!}</li>

                      @endif
                      <li><span class="glyphicon glyphicon-ok-sign"></span>Cài đặt App để mua sách online trên VNA </li>
                  <span class="label label-warning">Giới  thiệu cuốn sách</span>
                  <li><strong>Tên</strong> : <i>{!!$row->name!!}</i></li>
                  <li><strong>Tác Giả </strong> : <i>{!!$row->author!!}</i></li>
                  <li><strong>Nhà XB</strong> : <i>{!!$row->pub_company!!}</i></li>
                  <li><strong>Mô Tả</strong> : <i>{!!$row->note!!} </i></li>
                  </a>
                </div>                
                  <div class="price">  
                    <span class="btn btn-info btn-block "><strong>{!!number_format($row->price)!!}</strong> Vnd</span>   
                    <a href="{!!url('gio-hang/addcart/'.$row->id)!!}" class="btn btn-success btn-block">Thêm vào giỏ</a>                  
                  </div>                  
              </div> 
            </div>
          </div>
        @endforeach
        <div class="clearfix">
          
        </div>
    </div>
          <!--==================================================/products ============================== -->
        {!!$data->render()!!}
@endsection