<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Study extends Model
{
    use Notifiable;

    public function user(){
        return $this->belongsTo('App\User','id');
    }
    protected $fillable = [
        'id',
        'study',
        'links'
    ];
    protected $casts = [
        'id' => 'integer',
        'study' => 'string',
        'links' => 'string'
    ];

    public static $rules = [
        'id' => 'required',
        'study' => 'required'
    ];
}
