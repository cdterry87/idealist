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
        'idea', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
