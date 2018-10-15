<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function customers(){
        return $this->hasMany('App\Model\Customer');
    }


}
