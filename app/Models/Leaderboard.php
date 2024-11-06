<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leaderboard extends Model
{
    protected $fillable = [
        'user_id',
        'score',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'user_id');
    }
}
