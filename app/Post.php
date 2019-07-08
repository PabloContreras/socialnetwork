<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'body',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the likes of the post.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function likes()
    {
        return $this->morphToMany('App\User', 'likeable');
    }
    public function comments()
    {
        return $this->morphToMany('App\comments');
    }

    /**
     * Check if the post is liked.
     *
     * @return bool
     */
    public function isLiked()
    {
        $like = $this->likes()->whereUserId(Auth::id())->first();

        return isset($like) ? true : false;
    }
}
