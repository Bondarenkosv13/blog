<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'title',
        'small_description',
        'description',
        'image',
        'is_published',
        'published_at',
    ];

    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function messages()
    {
        return $this->hasMany('App\Models\Message');
    }

    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }
}
