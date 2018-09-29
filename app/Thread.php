<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 */
class Thread extends Model
{
    protected $guarded = [];

    protected $fillable = ['id','subject', 'thread', 'type', 'user_id'];

   /* public function scopeLastThreads($query, $count)
    {
        return $query->orderBy('created_at', 'desc')->take($count)->get();
    }*/


   public function user()
   {
       return $this->belongsTo(User::class);
   }
}
