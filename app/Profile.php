<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'hr_id',
        'avatar',
        'site_id',
        'department_id',
        'position_id',
        'ip_phone',
        'mobile', ];

        public function user()
        {
            return $this->belongsTo('App\User');
        }

        public function site()
        {
            return $this->belongsTo('App\Site');
        }

}
