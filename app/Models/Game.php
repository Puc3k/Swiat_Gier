<?php

namespace App\Models;

use App\Model\Scope\LastWeekScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $attributes = [
        'metacritic_score' => null
    ];

    protected $casts = [
        'metacritic_score' => 'integer',
        'steam_appid' => 'integer',
    ];


    // ====> ATTRIBUTES <====

    public function getScoreAttribute(): ?int
    {
        return $this->metacritic_score;
    }

    public function getSteamIdAttribute(): int
    {
        return $this->steam_appid;
    }

    public function getShortDescriptionAttribute()
    {
        return $this->attributes['short_description'];
    }

    // ====> RELATIONS <====

    public function genres()
    {
        return $this->belongsToMany('App\Models\Genre', 'gameGenres');
    }

    public function publishers()
    {
        return $this->belongsToMany('App\Models\Publisher', 'gamePublishers');
    }

    // ====> SCOPE <====

    // using global scope
    //protected static function booted()
    //{
    //    static::addGlobalScope(new LastWeekScope());
    //}

    public function scopeBest(Builder $query): Builder
    {
        return $query->where('metacritic_score', '>' , 80)
            ->orderBy('metacritic_score', 'desc');
    }

    public function scopePublisher(Builder $query, string $publisher): Builder
    {
        return $query->where('publisher', $publisher);
    }
}
