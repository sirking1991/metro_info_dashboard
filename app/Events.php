<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    public function user() {
        return $this->belongsTo('App\User', 'posted_by', 'id');
    }
}
