<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;
use App\Fish;
use App\fuel;

class weatherController extends Controller
{
    public function createPrice(Request $req){
	$url="http://api.apixu.com/v1/forecast.json?key=3e427a7adb0f472bac380620181002&q=Jakarta";
	$json = file_get_contents($url);
	$data =json_decode($json,TRUE);
	$fish = Fish::get()->where('name','=',$req->name);
	
	$temperature=$data['current']['temp_c'];
	$condition=$data['current']['condition']['text'];
	$price=$fish->base_price;
	if(strpos($condition,"rain")!==false ){
		$price*=1.2;
	}
	else if(strpos( $strpos,"Cloudy") !== false ){
		$price*=1;
	}
	else{
		$price*=0.8;
	}

	if($temperature<28){
		$price=($price-((28-$temperature)*2/100*$price));
	}
	else{
		$price=($price+(($temperature-28)*2/100*$price));	
	}
	$temp=fuel::find(1);
	$price+=$temp->price;
	
	return view('Price',compact('price'));


    }
}
