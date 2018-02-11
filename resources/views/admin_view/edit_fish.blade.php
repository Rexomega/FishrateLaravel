@extends("layout")
@section("title","Edit Fish")
@section("content")
	<form action="{{url('admin/fish/edit/'.$data->id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
		{{csrf_field()}}
		@if($errors->any())
			 <?php Fungsi::alertValidasi($errors->all())?>
		@endif
		<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txt_name">Fish Name</label>  
  <div class="col-md-4">
  <input value="{{$data->fish_name}}" id="txt_name" name="txt_name" placeholder="Fish Name" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txt_price">Base Price</label>  
  <div class="col-md-4">
  <input value="{{$data->base_price}}" id="txt_price" name="txt_price" placeholder="Base Price" class="form-control input-md" type="text">
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="file_photo">Fish Photo</label>
  <div class="col-md-4">
    <img src="{{url('img/fish/'.$data->fish_photo)}}" width="100" height="100">
    <br>
    <input  id="file_photo" name="file_photo"  type="file">
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
    <button id="" name="" class="btn btn-primary">Edit</button>
  </div>
</div>
	</form>
@endsection