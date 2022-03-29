<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $attributes = [
       'score' => 5
    ];

    public function  genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
