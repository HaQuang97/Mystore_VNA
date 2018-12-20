@extends('back-end.layouts.master')
@section('content')
<!-- main content - noi dung chinh trong chu -->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Sản phẩm</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><small>Sửa sản phẩm </small></h1>
			</div>
		</div><!--/.row-->		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">					
					<div class="panel-body" style="background-color: #ecf0f1; color:#27ae60;">
					@if (count($errors) > 0)
				    	<div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
				    </div>
				    @elseif (Session()->has('flash_level'))
				    	<div class="alert alert-success">
					        <ul>
					            {!! Session::get('flash_massage') !!}	
					        </ul>
					    </div>
					@endif
						<form action="" method="POST" role="form" enctype="multipart/form-data">
				      		{{ csrf_field() }}
				      		<div class="form-group">
					      		<label for="input-id">Chọn danh mục</label>
					      		<select name="sltCate" id="inputSltCate" required class="form-control">
					      			<option value="">--Chọn danh mục--</option>
					      			@foreach($cat as $dt)
					      				<option value="{!!$dt->id!!}" >{!!'--|--|'.$dt->name!!}</option> 	
					      			@endforeach	
					      		</select>
				      		</div>
				      		<div class="form-group">
				      			<label for="input-id">Tên sản phẩm</label>
				      			<input type="text" name="txtname" id="inputTxtname" class="form-control" value="{!! old('txtname',isset($pro["name"]) ? $pro["name"] : null) !!}"  required="required">
				      		</div>
				      		<div class="form-group">
								<label for="input-id">Giới thiệu sản phẩm</label>
				      			<input type="text" name="txtnote" id="inputTxtnote" class="form-control" value="{!! old('txtnote',isset($pro["note"]) ? $pro["note"] : null) !!}" required="required">
				      		</div>
							<div class="form-group">
								<label for="input-id">Tóm tắt chức năng</label>
								<input type="text" name="txtintro" id="inputTxtintro" class="form-control" value="{!! old('txtintro',isset($pro["intro"]) ? $pro["intro"] : null) !!}" required="required">
							</div>
				      		<div class="form-group">				      			
				      			<div class="row">
					      			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					      				Hình ảnh : <input type="file" name="txtimg" accept="image/png" id="inputtxtimg"  class="form-control" >
					      				Ảnh cũ: <img src="{!!url('public/uploads/products/'.$pro->images)!!}" alt="{!!$pro->images!!}" width="80" height="60">
					      			</div>
					      			<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
					      				Giá bán : <input type="number" name="txtprice" id="inputtxtprice" class="form-control" value="{!! old('txtproname',isset($pro["price"]) ? $pro["price"] : null) !!}" required="required">
					      			</div>
					      		</div>				      			
				      		</div>

				      	<div class="form-group">
							<label for="input-id"> Mô tả sản phẩm</label>
						</div>
						<div class="form-group">
							Tên Sản Phẩm : <input type="text" name="txtName" id="inputtxtName" value="{!! old('txtName',isset($pro->pro_details->name) ? $pro->pro_details->name : null) !!}" class="form-control" >
						</div>
						<div class="form-group">
							Tác Giả: <input type="text" name="txtauthor" id="inputtxtauthor" value="{!! old('txtauthor',isset($pro->pro_details->author) ? $pro->pro_details->author : null) !!}" class="form-control">
						</div>
						<div class="form-group">
							Nhà XB: <input type="text" name="txtpub" id="inputtxtpub" value="{!! old('txtpub',isset($pro->pro_details->pub_company) ? $pro->pro_details->pub_company : null) !!}" class="form-control" >
						</div>
						<div class="form-group">
							<label for="input-id">Giới thiệu chi tiết </label>
							<textarea name="txtNote" id="inputTxtNote" class="form-control" rows="2" required="required">{{ old('txtNote') }}</textarea>
							<script type="text/javascript">
                                var editor = CKEDITOR.replace('txtNote',{
                                    language:'vi',
                                    filebrowserImageBrowseUrl : '../../plugin/ckfinder/ckfinder.html?Type=Images',
                                    filebrowserFlashBrowseUrl : '../../plugin/ckfinder/ckfinder.html?Type=Flash',
                                    filebrowserImageUploadUrl : '../../plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                    filebrowserFlashUploadUrl : '../../plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                });
							</script>
						</div>
							<input type="submit" name="btnCateAdd" class="btn btn-primary" value="Thêm sản phẩm" class="button" />
						</form>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
<!-- =====================================main content - noi dung chinh trong chu -->
@endsection