<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'history';

    protected $fillable = [
        'user_id', 'idea_id', 'action'
    ];

    protected $appends = ['elapsed_time'];

    public function getElapsedTimeAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function idea()
    {
        return $this->belongsTo(Idea::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addHistory($idea_id, $action)
    {
        return $this->create([
            'user_id' => auth()->id(),
            'idea_id' => $idea_id,
            'action' => $action
        ]);
    }
}
