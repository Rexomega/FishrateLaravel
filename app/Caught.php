<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Caught extends Model
{
    //
    protected $table = "caught";
    protected $fillable = [
         'user_id', 
    ];

   

    public function user(){
    	return $this->belongsTo("App\User","user_id");
    }

    public function detail_caught(){
        return $this->hasMany("App\Detail_caught","caught_id");
    }

    static function jumlah_tangkapan($tanggal_transaksi,$user_id){
        
        $header =  DB::table("caught as h")->where("created_at","LIKE",$tanggal_transaksi."-%")->where("user_id",$user_id);
        $data =  $header->count();
        if($data==NULL){
            return 0;
        }else{
            return $data;
        }
    }

}
