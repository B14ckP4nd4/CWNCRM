<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'g2fa_secret'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'g2fa_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function setG2faSecretAttribute($value)
    {
        $this->attributes['g2fa_secret'] = encrypt($value);
    }

    public function getG2faSecretAttribute($value)
    {
        return (is_null($value)) ? $value : decrypt($value) ;
    }

//    public function setGoogle2faSecretAttribute($value)
////    {
////        $this->attributes['g2fa_secret'] = encrypt($value);
////    }
////
////    public function getGoogle2faSecretAttribute($value)
////    {
////        return decrypt($value);
////    }
}
