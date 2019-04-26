<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idea', 'user_id', 'votes'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
