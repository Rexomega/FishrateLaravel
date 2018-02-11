<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Detail_caught extends Model
{
    //
    protected $table = "detail_caught";
    protected $fillable = [
        'fish_id', 'fish_caught','caught_id'
    ];

    public function fish(){
    	return $this->belongsTo("App\Fish","fish_id");
    }

    public function caught(){
        return $this->belongsTo("App\Caught","caught_id");
    }

    static function jumlah_transaksi($tanggal_transaksi){
        
        $header =  DB::table("detail_caught as h")->where("created_at","LIKE",$tanggal_transaksi."-%");
        $data =  $header->sum("fish_caught");
        if($data==NULL){
            return 0;
        }else{
            return $data;
        }
    }
}
