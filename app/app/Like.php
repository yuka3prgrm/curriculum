<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{

    protected $fillable = ['del_flg','user_id','product_id'];

    public function user(){
        return $this->belongsTo("App\User","user_id","id");
    }

    public function product(){
        return $this->belongsTo("App\Product","product_id","id");
    }
}
