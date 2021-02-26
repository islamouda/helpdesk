<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [ 'type' ];

    public function tickets()
    {
        return $this->belongsToMany('App\Ticket');
    }

}
