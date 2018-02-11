<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    //

    protected $table = "market";
    protected $fillable = [
        'market_name', 'market_address',
    ];


    public function market_detail(){
    	return $this->hasMany("App\Market_detail","market_id");
    }
}
