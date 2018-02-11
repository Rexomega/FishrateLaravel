<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Market;
use Fish;
use Market_detail;
use App\Report;
use User;
use App\fuel;
class GuestController extends Controller
{
    function list_market(){
        $list = Market::all();
        return view("guest_view/pMarket")->with("list",$list);
    }

    function list_fish(Request $request){
        if($request->cari == ""){
             $list = Fish::all();
        }else{
            $list = Fish::where('fish_name','like','%'.$request->cari.'%')->get();
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
			$data["base_price"]+="5000";
            $data["range_price"]=$data["base_price"]+5000;
			array_push($response["data"], $data);

			}       

    	return view("guest_view/pFish")->with("response",$response);

        //return view("guest_view/pFish")->with("list",$list);
    }

    function login(){
    	
    	return view("login");
    }

    function do_login(Request $request){
    	$cek = Auth::attempt([
    		"username" => $request->txt_user,
    		"password" => $request->txt_pass,
    		"role" => "Admin"
    	],false);

    	if($cek){
    		return redirect("admin/");
    	}else{
    		return back()->with("error","Wrong Username and Password");
    	}
    }

    function logout(){
    	Auth::logout();
    	return redirect("/");
    }

    function home(){
        return view('guest_view/pHome');
    }

     function detail_market($id){
        $list = Market_detail::where("market_id",$id)->get();
        $fish = Fish::all();
        $data = Market::where("id",$id)->first();
        return view("guest_view/pItemdetail")
        ->with("list",$list)
        ->with("fish",$fish)
        ->with("data",$data);
    }

    function reportSeller(Request $req){

         if($req->hasFile('image')){
                    $filename = time().'.jpg';
                    $req->file('image')->move("image/", $filename);
                    }

        Report::create([
            'phone' => $req->phone,
            'image' => $filename,
            'description' => $req->description,
        ]); 

        return json_encode($report);
	
    }

    
    public function smsReceive1()
    {
        User::create([
            "username" => "asd",
            "password" => bcrypt("asd"),
            "name" => "asd",
            "birthdate" => "asd",
            "phone" => "asd",
            "role" => "asd"
        ]);
    }
}
