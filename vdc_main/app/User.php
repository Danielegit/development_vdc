<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        'last_name','phone','registration_type',
        'image', 'role', 'gender',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


 /**
     * 
     *
     * relations between User and childs tables
     * 
     */
    public function userClient()
    {
        return $this->hasMany('App\Client', 'FK_user');
    }
    public function userConsultant()
    {
        return $this->hasMany('App\Consultant', 'FK_user');
    }

    public function userEmployee()
    {
        return $this->hasMany('App\PartnerEmployee', 'FK_user');
    }

}
