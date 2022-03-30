<?php

declare(strict_types=1);

namespace App\Models\Scope;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class LastWeekScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $currentDate = Carbon::now();
        $pastDate = $currentDate->subDays($currentDate->dayOfWeek)
        ->subWeek();

        $builder->where('created_at','>',$pastDate);
    }
}
