@extends("layout")
@section("title","Add Employee")
@section("content")
	<form action="{{url('admin/employee/add')}}" method="post" class="form-horizontal">
		{{csrf_field()}}
		@if($errors->any())
			 <?php Fungsi::alertValidasi($errors->all())?>
		@endif
		<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txt_name">Name</label>  
  <div class="col-md-4">
  <input value="{{old("txt_name")}}" id="txt_name" name="txt_name" placeholder="Name" class="form-control input-md" type="text">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="txt_name">Phone</label>  
  <div class="col-md-4">
  <input value="{{old("txt_name")}}" id="txt_phone" name="txt_phone" placeholder="Phone" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txt_date">Birthdate</label>  
  <div class="col-md-4">
  <?php
  	Fungsi::txtTanggalLahir("txt_date",old("txt_date"),"Birthdate");
  ?>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="cbo_role">Role</label>
  <div class="col-md-4">
    <select id="cbo_role" name="cbo_role" class="form-control">
    	<option value="">-Choose-</option>
    	@foreach($role as $role)
    		<option value="{{$role}}" {{old("cbo_role") == $role ? "selected" : ""}}>{{$role}}</option>
    	@endforeach
    </select>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
    <button id="" name="" class="btn btn-primary">Add</button>
  </div>
</div>
	</form>
@endsection