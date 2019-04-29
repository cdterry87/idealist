<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'idea_id'
    ];

    public function idea()
    {
        return $this->belongsToMany(Idea::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
