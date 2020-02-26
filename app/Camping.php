<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Camping extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
