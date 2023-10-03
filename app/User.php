<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $primaryKey = 'USERID';     

    protected $dates = [
        'trial_until'
    ];
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        // 'name', 'email', 'password',
        'USERID',
        'USERID_F',
        'PRICECATALOGID',
        'USERGROUPID',
        'STATUSID',
        'FIRST_NAME',
        'SECOND_NAME',
        'PHONE',
        'email',
        'email_verified_at',
        'password',
        'rememberToken',
        'timestamps',
        'START_SUSCRIPTION',
        'END_SUSCRIPTION',
        'trial_until'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'PASSWORD', 'remember_token',
    ];
    protected $table = 'USER';
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

        'email_verified_at' => 'datetime',

    ];


    public function getFreeTrialDaysLeftAttribute()
    {
        // Future field that will be implemented after payments
        if ($this->plan_until) { 

            return 0;
        }

        return now()->diffInDays($this->trial_until, false);
    }

}
