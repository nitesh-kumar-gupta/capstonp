<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Course extends Model
{
    use Notifiable;
    protected $fillable = [
        'course_id',
        'branch_id',
        'course_abb',
        'course_name',
        'course_description'
    ];
    protected $casts = [
        'course_id' => 'integer',
        'branch_id' => 'integer',
        'course_abb' => 'string',
        'course_name' => 'string',
        'course_description' => 'string'
    ];

    public static $rules = [
        'course_id' => 'required',
        'branch_id' => 'required',
        'course_abb' => 'required',
        'course_name' => 'required'
    ];
}
