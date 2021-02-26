<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'priority_id',
        'type_id',
        'status_id',
        'user_id',
        'recipient_id',
        'title',
        'subject',
        'replay',
        'avatar',
        'ticket_time',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function priority(){
        return $this->belongsTo('App\Priority');
    }

    public function types()
    {
        return $this->belongsToMany('App\Type');
    }

    public function status()
    {
        return $this->belongsToMany('App\Status');
    }


}
