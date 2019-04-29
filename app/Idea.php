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

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function userVotes()
    {
        return $this->hasManyThrough(User::class, Vote::class, 'user_id', 'id');
    }

    public function addFavorite($userId)
    {
        return $this->favorites()->create(['user_id' => $userId]);
    }

    public function addVote($userId)
    {
        return $this->votes()->create(['user_id' => $userId]);
    }
}
