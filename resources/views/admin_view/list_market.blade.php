@extends("layout")
@section("title","Market List")
@section("content")
<?php
	Fungsi::tableAtas("Market Name^|^ Address^|^^|^^|^");
	$posisi="";
	$status="";
	foreach($list as $list){
		Fungsi::tableTengah("
			
			".$list->market_name."^|^
			".$list->market_address."^|^
			
			
			<a href='".URL::to("admin/market/detail/".$list->id)."' class='btn btn-primary'><i class='glyphicon glyphicon-list'></i> Marketed Fish</a>^|^
			<a href='".URL::to("admin/market/edit/".$list->id)."' class='btn btn-primary'><i class='glyphicon glyphicon-pencil'></i> Edit</a>^|^
			<a href='".URL::to("admin/market/delete/".$list->id)."' class='btn btn-danger'><i class='glyphicon glyphicon-remove'></i> Delete</a>
			
		");
	}
	Fungsi::tableBawah();
?>
@endsection