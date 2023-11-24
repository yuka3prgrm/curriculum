<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['amount','status_id','user_id','product_id','address_id'];

    public function user(){
        return $this->belongsTo("App\User","user_id","id");
    }

    public function product(){
        return $this->belongsTo("App\Product","product_id","id");
    }

    public function address(){
        return $this->belongsTo("App\Address","address_id","id");
    }

}
