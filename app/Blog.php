<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\CustomClasses\EncryptDecrypt;
use Illuminate\Support\Facades\Crypt;

class Blog extends Model
{

    protected $fillable=['user_id','title','content'];
    protected $dates = ['created_at', 'updated_at'];
    //


    public function user(){
        return $this->belongsTo('App\User');
    }




//    public function setContentAttribute($value)
//    {
//        return $this->attributes['content']=Crypt::encryptString($value);
//    }


    public function getCreatedAtAttribute($value)
    {
        // example
        return explode(" ",$value)[0];

    }

    public function getContentAttribute($value){

            return $this->content=Crypt::decryptString($value);;

    }



    public function scopeToday($query, $date)
    {
        return $query->where('created_at', '>',$date);
    }
    public static function scopeFetchAll($query,$orderBy){
        return $query->orderBy($orderBy,'desc')->get();
    }
    public static function scopeFetchOne($query,$id){
        return $query->where('id',$id)->get();
    }

}
