<?php

namespace App\Models;

use App\Models\Scope\LastWeekScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable=[
        'title','description','score','publisher','genre_id'
    ];

    protected $attributes = [
       'score' => 5
    ];

    protected static function booted()
    {
        static::addGlobalScope(new LastWeekScope());
    }

    public function  genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function scopeBest(Builder $query): Builder
    {
        return $query
        ->with('genre')
        ->where('score','>',9)
        ->orderBy('score','desc');
    }

    public function scopeGenre(Builder $query, int $genreId): Builder
    {
        return $query
            ->where('genre_id',$genreId);
    }

    public function scopePublisher(Builder $query, string $name): Builder
    {
        return $query->where('publisher', $name);

    }
}
