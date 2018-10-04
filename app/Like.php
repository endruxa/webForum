<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property  user_id
 * @property int $user_id
 * @property \Carbon\Carbon $created_at
 */
class Like extends Model
{

    protected $guarded = [];
    protected $fillable = ['user_id', 'likable_id', 'likable_type'];

    public function likable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
