<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function appUser() {
        return $this->belongsTo('App\AppUser', 'appuser_id', 'id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'read_by', 'id');
    }    
}
