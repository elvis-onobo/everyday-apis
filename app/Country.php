<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    // get the states for a particular country
    public function states(){
        return $this->hasMany('App\State', 'country_id');
    }
}
