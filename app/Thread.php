<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 * @property mixed $user
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Thread extends Model
{
    use CommentableTrait;

    protected $guarded = [];

    protected $fillable = ['id','subject', 'thread', 'type', 'user_id', 'solution'];


   public function user()
   {
       return $this->belongsTo(User::class);
   }

}
