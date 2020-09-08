<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'post_id',
        'user_id',
        'parent_id',
        'content',
        'timestamp',
    ];

    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function posts()
    {
        return $this->belongsTo('App\Models\Post');
    }

    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }
}
