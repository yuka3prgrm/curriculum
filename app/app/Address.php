<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

    protected $fillable = ['fullname','tel','postal_code','prefecture_id','city','house_number','building_name','user_id'];

    public function user(){
        return $this->belongsTo("App\User","user_id","id");
    }
}
