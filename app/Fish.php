<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fish extends Model
{
    //
    protected $table = "fish";
    protected $fillable = [
        'fish_name', 'base_price', 'fish_photo',
    ];

    public function caught(){
    	return $this->hasMany("App\Caught","fish_id");
    }

    public function market_detail(){
    	return $this->hasMany("App\Market_detail","fish_id");
    }
}
