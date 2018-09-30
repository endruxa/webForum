<?php
/**
 * Created by PhpStorm.
 * User: Anatoliy
 * Date: 30.09.18
 * Time: 19:04
 */

namespace App;


trait CommentableTrait
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->latest();
    }

    public function addComment($body)
    {
        $comment = new Comment();
        $comment->body = $body;
        $comment->user_id = auth()->user()->id;

        $this->comments()->save($comment);

        return $comment;
    }


}