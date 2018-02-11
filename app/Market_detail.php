<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Market_detail extends Model
{
    //

    protected $table = "market_detail";
    protected $fillable = [
        'market_id', 'fish_id',
    ];


    public function market(){
    	return $this->belongsTo("App\Market","market_id");
    }

 	public function fish(){
    	return $this->belongsTo("App\Fish","fish_id");
    }

       
}
