@extends("layout")
@section("title","Detail for ".$data->market_name)
@section("content")

<div class="col-md-6">
	<table class="table">
		<tr>
			<th>Market Name</th>
			<th>:</th>
			<td>{{$data->market_name}}</td>
		</tr>
		<tr>
			<th>Market Address</th>
			<th>:</th>
			<td>{{$data->market_address}}</td>
		</tr>
	</table>
	<h2>Marketed Fish</h2>
<div id="accordion">
  <h3>Add Marketed Fish</h3>
  <div>
    <form action="{{url('admin/market/detail/'.$data->id.'/add')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
		{{csrf_field()}}
		@if($errors->any())
			 <?php Fungsi::alertValidasi($errors->all())?>
		@endif
		<!-- Text input-->
<div class="form-group">
  <label class=" control-label" for="txt_name">Fish</label>  
  <div class="col-md-10">
  <select name="cbo_fish" class="form-control">
  	@foreach($fish as $fish)
  		<option value="{{$fish->id}}">{{$fish->fish_name}}</option>
  	@endforeach
  </select>
    
  </div>
</div>




<!-- Button -->
<div class="form-group">
  <label class="control-label" for=""></label>
  <div class="">
    <button id="" name="" class="btn btn-primary">Add</button>
  </div>
</div>
	</form>
  </div>
</div>
<?php
	Fungsi::tableAtas("Fish Name^|^Base Price^|^Photo^|^");
	$posisi="";
	$status="";
	foreach($list as $list){
		Fungsi::tableTengah("
			
			".$list->fish->fish_name."^|^
			".Fungsi::formatUang($list->fish->base_price)."^|^
			<img src='".url("img/fish/".$list->fish->fish_photo)."' width='100' height='100'>^|^
			
			
			
			<a href='".URL::to("admin/market/detail/".$data->id."/delete/".$list->id)."' class='btn btn-danger'><i class='glyphicon glyphicon-remove'></i> Delete</a>
			
		");
	}
	Fungsi::tableBawah();
?>
</div>
<div class="col-md-6">
	<?php Fungsi::google_map(450,400,$data->market_address)?>
</div>
<br clear="all">
  <script>
  $( function() {
    $( "#accordion" ).accordion({
      collapsible: true,
      @if($errors->any())
      	active:0
      @endif
    });
  } );
  </script>
@endsection