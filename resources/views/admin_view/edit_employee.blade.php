@extends("layout")
@section("title","Edit Employee")
@section("content")
	<form action="{{url('admin/employee/edit/'.$data->id)}}" method="post" class="form-horizontal">
		{{csrf_field()}}
		@if($errors->any())
			 <?php Fungsi::alertValidasi($errors->all())?>
		@endif
		<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txt_name">Name</label>  
  <div class="col-md-4">
  <input value="{{$data->name}}" id="txt_name" name="txt_name" placeholder="Name" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txt_date">Birthdate</label>  
  <div class="col-md-4">
  <?php
  	Fungsi::txtTanggalLahir("txt_date",Carbon::parse($data->birthdate)->format("d-m-Y"),"Birthdate");
  ?>
  </div>
</div>

<!-- Select Basic -->


<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
    <button id="" name="" class="btn btn-primary">Edit</button>
  </div>
</div>
	</form>
@endsection