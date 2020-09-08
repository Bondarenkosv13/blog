<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'post_id',
        'message_id',
        'user_id',
    ];

    public $timestamps = false;

    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function posts()
    {
        return $this->belongsTo('App\Models\Post');
    }

    public function messages()
    {
        return $this->belongsTo('App\Models\Message');
    }
}
