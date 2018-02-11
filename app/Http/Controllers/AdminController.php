<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use User;
use Fungsi;
use Carbon;
use Fish;
use Market;
use Market_detail;
class AdminController extends Controller
{
    
    function statistik(){

        return view("admin_view/statistik");
    }

    function catch_fisherman($id){
        $data = User::find($id);
        return view("admin_view/list_catch")->with("data",$data);
    }

    function list_employee_admin(){
    	$list = User::where("role","Admin")->get();
    	return view("admin_view/list_employee")->with("list",$list);
    }

    function list_employee_fisherman(){
        $list = User::where("role","Fisherman")->get();
        return view("admin_view/list_fisherman")->with("list",$list);
    }



    function add_employee(Request $request){
    	if($request->has("_token")){
    		$rules = [
    			"txt_name" => "required",
                "txt_phone" => "required|numeric",
    			"txt_date" => "required",
    			"cbo_role" => "required"
    		];
    		$attribute = [
    			"txt_name" => "Name",
    			"txt_date" => "Birthdate",
    			"cbo_role" => "Role",
                "txt_phone" => "Phone",
    		];

    		$this->validate($request,$rules,[],$attribute);
    		$role = $request->cbo_role;
    		switch ($role) {
    			case 'Admin':
    				$depan = "ADM";
    				break;
    			
    			case 'Fisherman':
    				$depan = "FSH";
    				break;
    		}
    		$username  = Fungsi::generateID("users",$depan,"username","role = '".$role."'");
    		$birthdate = Carbon::parse($request->txt_date);
    		$name = $request->txt_name;
            $phone = $request->txt_phone;
    		$password = Carbon::parse($request->txt_date)->format("dmy");
    		User::create([
    			"username" => $username,
    			"password" => bcrypt($password),
    			"name" => $name,
    			"birthdate" => $birthdate,
                "phone" => $phone,
    			"role" => $role
    		]);
    		
    		return redirect("admin/employee");
    	}

    	//$role = ["Admin","Fisherman"];
        $role = ["Admin"];
    	return view("admin_view/add_employee")->with("role",$role);
    }


    function edit_employee(Request $request,$id){
    	$data = User::find($id)->first();
    	if($request->has("_token")){
    		$rules = [
    			"txt_name" => "required",
    			"txt_date" => "required",
    			
    		];
    		$attribute = [
    			"txt_name" => "Name",
    			"txt_date" => "Birthdate",
    			
    		];

    		$this->validate($request,$rules,[],$attribute);
    		
    		$birthdate = Carbon::parse($request->txt_date);
    		$name = $request->txt_name;
    		
    		
    		$data->name = $name;
    		$data->birthdate = $birthdate;
    		$data->save();
    		
    		return redirect("admin/employee");
    	}

    	
    	return view("admin_view/edit_employee")->with("data",$data);
    }

    function list_fish(){
    	$list = Fish::all();
    	return view("admin_view/list_fish")->with("list",$list);
    }

    function add_fish(Request $request){
    	if($request->has("_token")){
    		$rules = [
    			"txt_name" => "required",
    			"txt_price" => "required|numeric",
    			"file_photo" => "required|image|mimes:jpeg,png",
    		];
    		$attribute = [
    			"txt_name" => "Fish Name",
    			"txt_price" => "Base Price",
    			"file_photo" => "Fish Photo"
    		];

    		$this->validate($request,$rules,[],$attribute);
    		
    		$price =$request->txt_price; 
    		$name = $request->txt_name;
    		$photo = $request->file_photo;
    		$photo->move("img/fish/",$photo->getClientOriginalName());
    		
    		Fish::create([
    			"fish_name" => $name,
    			"base_price" => $price,
    			"fish_photo" => $photo->getClientOriginalName(),
    			
    		]);
    		
    		return redirect("admin/fish");
    	}

    	
    	return view("admin_view/add_fish");
    }


    function edit_fish(Request $request,$id){
    	$data = Fish::where("id",$id)->first();
    	if($request->has("_token")){
    		$rules = [
    			"txt_name" => "required",
    			"txt_price" => "required|numeric",
    			"file_photo" => "image|mimes:jpeg,png",
    		];
    		$attribute = [
    			"txt_name" => "Fish Name",
    			"txt_price" => "Base Price",
    			"file_photo" => "Fish Photo"
    		];

    		$this->validate($request,$rules,[],$attribute);
    		
    		$price =$request->txt_price; 
    		$name = $request->txt_name;
    		

    		if(!empty($request->file_photo)){
    			$photo = $request->file_photo;
    			$photo->move("img/fish/",$photo->getClientOriginalName());
    			$data->fish_photo = $photo->getClientOriginalName();
    		}
    		$data->fish_name = $name;
    		$data->base_price = $price;
    		$data->save();
    		
    		return redirect("admin/fish");
    	}

    	
    	return view("admin_view/edit_fish")->with("data",$data);
    }

    function delete_fish($id){
    	$data = Fish::where("id",$id)->first();
    	$data->delete();
    	return redirect("admin/fish");
    }

    function list_market(){
    	$list = Market::all();
    	return view("admin_view/list_market")->with("list",$list);
    }

    function add_market(Request $request){
    	if($request->has("_token")){
    		$rules = [
    			"txt_name" => "required",
    			"txt_address" => "required",
    			
    		];
    		$attribute = [
    			"txt_name" => "Market Name",
    			"txt_address" => "Market Address",
    			
    		];

    		$this->validate($request,$rules,[],$attribute);
    		
    		$address =$request->txt_address; 
    		$name = $request->txt_name;
    		
    		Market::create([
    			"market_name" => $name,
    			"market_address" => $address,
    		]);
    		
    		return redirect("admin/market");
    	}

    	
    	return view("admin_view/add_market");
    }


    function edit_market(Request $request,$id){
    	$data = Market::find($id)->first();
    	if($request->has("_token")){
    		$rules = [
    			"txt_name" => "required",
    			"txt_address" => "required",
    			
    		];
    		$attribute = [
    			"txt_name" => "Market Name",
    			"txt_address" => "Market Address",
    			
    		];

    		$this->validate($request,$rules,[],$attribute);
    		
    		$address =$request->txt_address; 
    		$name = $request->txt_name;
    		
    		$data->market_name = $name;
    		$data->market_address = $address;
    		$data->save();
    		
    		return redirect("admin/market");
    	}

    	
    	return view("admin_view/edit_market")->with("data",$data);
    }

    function delete_market($id){
    	$data = Market::find($id);
    	$data->delete();
    	return redirect("admin/market");
    }

    function detail_market($id){
    	$list = Market_detail::all();
    	$fish = Fish::all();
    	$data = Market::where("id",$id)->first();
    	return view("admin_view/detail_market")
    	->with("list",$list)
    	->with("fish",$fish)
    	->with("data",$data);
    }

    function add_detail_market(Request $request,$id){

    	Market_detail::create([
    		"market_id" => $id,
    		"fish_id" => $request->cbo_fish
    	]);
    	return back();
    }

    function delete_detail_market($id){
    	$data = Market_detail::find($id);
    	$data->delete();
    	return back();
    }

     function route(){
        $list=Market::all();
        return view("admin_view/rute")
        ->with("list",$list);
    }
}
