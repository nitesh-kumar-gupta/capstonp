<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function quote(){
        return $this->hasMany('App\Quote');
    }
    public function study(){
        return $this->hasMany('App\Study');
    }
    protected $fillable = [
        'reg_id',
        'profile_image',
        'firstname',
        'middlename',
        'lastname',
        'email',
        'password',
        'batch',
        'branch',
        'course',
        'semester',
        'address',
        'city',
        'country',
        'zip',
        'about_me'
    ];
    protected $casts = [
        'reg_id' => 'integer',
        'profile_image' => 'string',
        'firstname' => 'string',
        'middlename' => 'string',
        'lastname' => 'string',
        'email' => 'string',
        'password' => 'string',
        'batch' => 'integer',
        'branch' => 'string',
        'course' => 'string',
        'semester' => 'integer',
        'address' => 'string',
        'city' => 'string',
        'country' => 'string',
        'zip' => 'string',
        'about_me' => 'string'
    ];

    public static $rules = [
        'reg_id' => 'required',
        'firstname' => 'required',
        'lastname' => 'required',
        'email' => 'required',
        'password' => 'required',
        'batch' => 'required',
        'branch' => 'required',
        'course' => 'required',
        'semester' => 'required'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
