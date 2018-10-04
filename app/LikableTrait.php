<?php
/**
 * Created by PhpStorm.
 * User: Anatoliy
 * Date: 30.09.18
 * Time: 19:04
 */

namespace App;


trait LikableTrait
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function likes()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function likeIt()
    {
        $like = new Like();
        $like->user_id = auth()->user()->id;

        $this->likes()->save($like);

        return $like;
    }

    public function unLikeIt()
        {
            //$like = Like::find($id);
            $this->likes()->where('user_id', auth()->id())->delete();

            return true;
        }


        public function isLiked()
        {
            return !!$this->likes()->where('user_id',auth()->id())->count();
        }

}