<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    /**
     * Get the country that owns the state.
     */
    public function country()
    {
        return $this->belongsTo('App\Country');
    }
}
