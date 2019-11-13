<?php

namespace App;


trait LikableTrait
{
    /**
     * @return Like
     */
    public function likes()
    {
        return $this->morphMany(Like::class, 'likable');
    }

    public function likeIt()
    {
        $like = new Like();
        $like->user_id = auth()->user()->id;
        $this->likes()->save($like);
        return $like;
    }

    public function unlikeIt()
    {
        $this->likes()->where('user_id',auth()->id())->delete();
    }

    /**
     * @return bool
     */
    public function isLiked()
    {
        return !!$this->likes()->where('user_id',auth()->id())->count();
    }

}
