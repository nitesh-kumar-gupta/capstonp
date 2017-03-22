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
    protected $fillable = [
        'reg_id',
        'firstname',
        'middlename',
        'lastname',
        'email',
        'password',
        'batch',
        'branch',
        'course',
        'semester'
    ];
    protected $casts = [
        'reg_id' => 'integer',
        'firstname' => 'string',
        'middlename' => 'string',
        'lastname' => 'string',
        'email' => 'string',
        'password' => 'string',
        'batch' => 'integer',
        'branch' => 'string',
        'course' => 'string',
        'semester' => 'integer'
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
