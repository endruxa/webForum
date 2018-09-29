<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 * @property mixed $user
 * @property mixed $comments
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Thread extends Model
{
    protected $guarded = [];

    protected $fillable = ['id','subject', 'thread', 'type', 'user_id'];


   public function user()
   {
       return $this->belongsTo(User::class);
   }


   public function comments()
   {
       return $this->morphMany(Comment::class, 'commentable');
   }
}
