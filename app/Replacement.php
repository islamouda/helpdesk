<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Replacement extends Model
{
    
    protected $fillable = [
        'user_id',
        'it_user_id',
        'damaged',
        'sn',
        'date_of_issue',
        'did_issue',
        'description_user',
        'manager',
        'status',
        'description_it',
        'cost',
        'date_of_req',
        'reason',
    ];

    public function parts()
    {
        return $this->belongsToMany('App\Part');
    }
    
}




