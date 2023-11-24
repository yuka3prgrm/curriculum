<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

    protected $fillable = ['fullname','tel','postal_code','place','user_id'];

    public function user(){
        return $this->belongsTo("App\User","user_id","id");
    }

    public function orders(){
        return $this->hasMany("App\Order");
    }
}
