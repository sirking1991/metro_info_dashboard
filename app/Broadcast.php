<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Broadcast extends Model
{
    public function user() {
        return $this->belongsTo('App\User', 'posted_by', 'id');
    }
}
