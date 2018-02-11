@extends("layout")
@section("title","Employee List")
@section("content")
<?php
	Fungsi::tableAtas("Username^|^Name^|^Phone^|^Birthdate^|^Role^|^");
	$posisi="";
	$status="";
	foreach($list as $list){
		Fungsi::tableTengah("
			".$list->username."^|^
			".$list->name."^|^
			".$list->phone."^|^
			".Carbon::parse($list->birthdate)->format("d-m-Y")."^|^
			".$list->role."^|^
			
			
			<a href='".URL::to("admin/employee/edit/".$list->id)."' class='btn btn-primary'><i class='glyphicon glyphicon-pencil'></i> Edit</a>
			
		");
	}
	Fungsi::tableBawah();
?>
@endsection