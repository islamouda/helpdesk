<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    protected $fillable = [ 'part' ];

    public function replacements()
    {
        return $this->belongsToMany('App\Replacement');
    }
}
