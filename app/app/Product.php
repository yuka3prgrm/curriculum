<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'image','introduction','stock','hidden_flg','del_flg'];

    public function reviews(){
        return $this->hasMany("App\Review");
    }

    public function likes(){
        return $this->hasMany("App\Like");
    }

    public function orders(){
        return $this->hasMany("App\Order");
    }
}
