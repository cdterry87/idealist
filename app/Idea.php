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

    public function favorite()
    {
        return $this->hasOne(Favorite::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function addFavorite($userId)
    {
        return $this->favorite()->create(['user_id' => $userId]);
    }

    public function addVote($userId)
    {
        return $this->votes()->create(['user_id' => $userId]);
    }
}
