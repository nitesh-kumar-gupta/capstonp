<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use Notifiable;
    protected $fillable = [
        'branch_id',
        'branch_name',
        'branch_description'
    ];
    protected $casts = [
        'branch_id' => 'integer',
        'branch_name' => 'string',
        'branch_description' => 'string'
    ];

    public static $rules = [
        'branch_id' => 'required',
        'branch_name' => 'required'
    ];
}
