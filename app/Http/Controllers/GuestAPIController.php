<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Fish;
use Market;
use Fungsi;
use Market_detail;
use Fuel;

class GuestAPIController extends Controller
{
    function smsReceive(Request $req){
       $response =array();
       $indexes = explode("#", $req->message);

       $response['nama'] = $indexes[0];
       $response['password'] = $indexes[1];
       $response['ttl'] = $indexes[2];
       $response['phone'] = $indexes[3];
       $response['role'] = "Fisherman";
       $username  = Fungsi::generateID("users","FSH","username","role = 'Fisherman'");   
       if(sizeof($response) == 5){
            User::create([ 
                'username' => $username,   
                'name' => $response['nama'],
                'password' => bcrypt($response['password']),
                'birthdate' => $response['ttl'],
                'role' => $response['role'],
                'phone' => $response['phone']
            ]);
       }
        return json_encode($response);
    }
	function list_fish(Request $request){
		$cari = $request->cari;
		$response = array();
		if(empty($cari)){
			$list = Fish::all();
		}else{
			$list = Fish::where("fish_name","like","%".$cari."%")->get();
		}
		$response["jumlah"] = count($list);
		$response["data"] = array();
		foreach($list as $list){
			$data=array();
			$data["id"] = $list->id;
			$data["fish_name"] = $list->fish_name;
			$data["base_price"] = $list->base_price;		
			$data["fish_photo"] = $list->fish_photo;
			$url="http://api.apixu.com/v1/forecast.json?key=3e427a7adb0f472bac380620181002&q=Jakarta";
			$json = file_get_contents($url);
			$wet =json_decode($json,TRUE);
			$temperature=$wet['current']['temp_c'];
			$condition=$wet['current']['condition']['text'];
			$price=$list->base_price;
			if(strpos($condition,"rain")!==false ){
				$data["base_price"]*=1.2;
			}
			else if(strpos( $condition,"Cloudy") !== false ){
				$data["base_price"]*=1;
			}
			else{
				$data["base_price"]*=0.8;
			}

			if($temperature<28){
				$data["base_price"]=($data["base_price"]-((28-$temperature)*2/100*$data["base_price"]));
			}
			else{
			$data["base_price"]=($data["base_price"]+(($temperature-28)*2/100*$data["base_price"]));	
			}
			$temp="8000";
			$data["base_price"]+=$temp;
			$data["range_price"]=$data["base_price"]+5000;
			array_push($response["data"], $data);
			}

		return json_encode($response);
	}

	function detail_fish_by_id($id){
		
		$list = Fish::where("id",$id)->get();

		$response["jumlah"] = count($list);
		$response["data"] = array();
		foreach($list as $list){
			$data=array();
			$data["id"] = $list->id;
			$data["fish_name"] = $list->fish_name;
			$data["base_price"] = $list->base_price;
			$data["fish_photo"] = $list->fish_photo;

			array_push($response["data"], $data);
		}

		return json_encode($response);
	}

	function detail_fish_by_name($name){
		
		$list = Fish::where("fish_name",$name)->get();
		
		$response["jumlah"] = count($list);
		$response["data"] = array();
		foreach($list as $list){
			$data=array();
			$data["id"] = $list->id;
			$data["fish_name"] = $list->fish_name;
			$data["base_price"] = $list->base_price;
			$data["fish_photo"] = $list->fish_photo;

			array_push($response["data"], $data);
		}

		return json_encode($response);
	}

	function list_market(Request $request){
		$cari = $request->cari;
		$response = array();
		if(empty($cari)){
			$list = Market::all();
		}else{
			$list = Market::where("market_name","like","%".$cari."%")->get();
		}
		$response["jumlah"] = count($list);
		$response["data"] = array();
		foreach($list as $list){
			$data=array();
			$data["id"] = $list->id;
			$data["market_name"] = $list->market_name;
			$data["market_address"] = $list->market_address;
			$data["long"] = Fungsi::lat_long($list->market_address)[1];
			$data["lat"] = Fungsi::lat_long($list->market_address)[0];

			array_push($response["data"], $data);
		}

		return json_encode($response);
	}

	function detail_market($id){
		
		$list = Market::where("id",$id)->get();

		$response["jumlah"] = count($list);
		$response["data"] = array();

		foreach($list as $list){
			$data=array();
			$data["id"] = $list->id;
			$data["market_name"] = $list->market_name;
			$data["market_address"] = $list->market_address;
			$data["long"] = Fungsi::lat_long($list->market_address)[1];
			$data["lat"] = Fungsi::lat_long($list->market_address)[0];
			array_push($response["data"], $data);
			$response["fish_data"] = array();
			$fish = Market_detail::where("market_id",$id)->get();		
			foreach($fish as $fish){
				$data_fish = array();
				$data_fish["id"] = $fish->fish->id;
				$data_fish["fish_name"] = $fish->fish->fish_name;
				$data_fish["base_price"] = $fish->fish->base_price;
				$data_fish["fish_photo"] = $fish->fish->fish_photo;
				array_push($response["fish_data"], $data_fish);
			}

		}

		return json_encode($response);
	}
    
}
