<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Quote extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function user(){
        return $this->belongsTo('App\User','id');
    }
    protected $fillable = [
        'id',
        'quote'
    ];
    protected $casts = [
        'id' => 'integer',
        'quote' => 'string',
    ];

    public static $rules = [
        'id' => 'required',
        'quote' => 'required'
    ];
}