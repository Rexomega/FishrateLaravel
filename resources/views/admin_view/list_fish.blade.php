@extends("layout")
@section("title","Fish List")
@section("content")
<?php
	Fungsi::tableAtas("Fish Name^|^Base Price^|^Photo^|^^|^");
	$posisi="";
	$status="";
	foreach($list as $list){
		Fungsi::tableTengah("
			
			".$list->fish_name."^|^
			".Fungsi::formatUang($list->base_price)."^|^
			<img src='".url("img/fish/".$list->fish_photo)."' width='100' height='100'>^|^
			
			
			<a href='".URL::to("admin/fish/edit/".$list->id)."' class='btn btn-primary'><i class='glyphicon glyphicon-pencil'></i> Edit</a>^|^
			<a href='".URL::to("admin/fish/delete/".$list->id)."' class='btn btn-danger'><i class='glyphicon glyphicon-remove'></i> Delete</a>
			
		");
	}
	Fungsi::tableBawah();
?>
@endsection