@extends("layout")
@section("title","Add Market")
@section("content")
	<form action="{{url('admin/market/add')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
		{{csrf_field()}}
		@if($errors->any())
			 <?php Fungsi::alertValidasi($errors->all())?>
		@endif
		<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txt_name">Market Name</label>  
  <div class="col-md-4">
  <input value="{{old("txt_name")}}" id="txt_name" name="txt_name" placeholder="Market Name" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txt_address">Market Address</label>  
  <div class="col-md-4">
  <textarea  id="txt_address" name="txt_address" placeholder="Market Address" class="form-control input-md" >{{old("txt_address")}}</textarea>
  </div>
</div>

<!-- Select Basic -->


<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
    <button id="" name="" class="btn btn-primary">Add</button>
  </div>
</div>
	</form>
@endsection