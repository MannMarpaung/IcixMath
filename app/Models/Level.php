<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = [
        'level',
        'name',
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
