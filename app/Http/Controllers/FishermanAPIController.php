<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Caught;
use Detail_caught;
use User;
use DB;
use Carbon;
use Auth;
use Fungsi;
use Fish;

class FishermanAPIController extends Controller
{
    //

  function register(Request $request){
    $response = array();
    $phone = $request->phone;
    if($request->name =="" || $request->birthdate=="" ){
      $message = "Wrong SMS Format. the format is: ";
      Fungsi::zenziva($phone,$message);
      $response["sukses"] =0;
    }else{
        $username  = Fungsi::generateID("users","FSH","username","role = 'Fisherman'");
        $birthdate = Carbon::parse($request->birthdate);
        $name = $request->name;
        
        $password = Carbon::parse($request->birthdate)->format("dmy");
        User::create([
          "username" => $username,
          "password" => bcrypt($password),
          "name" => $name,
          "birthdate" => $birthdate,
          "phone" => str_replace("+62","0",$phone),
          "role" => "Fisherman"
        ]);
        $response["sukses"] =1;
      $response["pesan"] ="Your Data has been registered Successfuly";
      Fungsi::zenziva($phone,$response["pesan"]);
      return json_encode($response);
    }
  }

	function login(Request $request){
       $response =array();
        $username = $request->txt_username;
        $password = $request->txt_password;
        
        $cek = Auth::attempt([
          "name" => $username,
          "password" =>$password,
          "role" => "Fisherman",
          
        ],false);
        if($cek){
        	$data = User::where("name",$username)->first();
           $response["sukses"] =1;
           $response["pesan"] = "Welcome, ". $data->name;
           $response["user_id"] = $data->id;
        
        }else{
           $response["sukses"] =0;
          $response["pesan"] = "Wrong Username and Password";

          
        }
                return json_encode($response);
      
     
    }

	function list_caught($fisherman_id){
		$response = array();
		$list =  Caught::where("user_id",$fisherman_id)->get();
		$response["count"] = count($list);
		$response["data"] =array();
		foreach($list as $list){
			$data =array();
			$data["caught_id"] = $list->id;
			$data["user_id"] = $list->user_id;
			$data["username"] = $list->user->username;
			$data["name"] = $list->user->name;
			$data["date"] = Carbon::parse($list->created_at)->format("d-m-Y");
			array_push($response["data"], $data);
		}
		return json_encode($response);
	}

	function detail_caught($caught_id){
  		$response = array();
  		$list =  Detail_caught::where("caught_id",$caught_id)->get();
  		$response["count"] = count($list);
  		$response["data"] =array();
  		foreach($list as $list){
  			$data =array();
  			$data["fish_id"] = $list->fish_id;
  			$data["fish_name"] = $list->fish->fish_name;
  			$data["fish_photo"] = $list->fish->fish_photo;
  			$data["fish_caught"] = $list->fish_caught;
  			
  			array_push($response["data"], $data);
  		}
  		return json_encode($response);
	}

  function add_caught(Request $request){

    	$response =array();

    	$fisherman_id = $request->user_id;
      $fisher=User::find($fisherman_id);

      $fisher['point']+=10;
      $fisher->save();
    	$ct = Caught::create([
    		"user_id" => $fisherman_id,
    	]);

    	$caught_id = $ct->id;
    	/*echo $ct->id;
    	die();*/
      $fish = Fish::where('fish_name','LIKE','%'.$request->fishName.'%')->first();
    	$fish_id = explode("|",$fish->id);
    	$qty = explode("|",$request->qty);
    	$index = 0;
    	foreach($fish_id as $id){
    		Detail_caught::create([
    			"fish_id" => $id,
    			"caught_id" => $caught_id,
    			"fish_caught" => $qty[$index],
    		]);

    		$index++;
    	}

    	 $response["sukses"] =1;
         $response["pesan"] = "Done Registering Your Caught";
         return json_encode($response);
    }
}
