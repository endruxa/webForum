<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $user_id
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 * @property mixed $likable
 * @property mixed $user
 */
class Like extends Model
{

    protected $guarded = [];

    public function likable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
