<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RequestLog
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //kod przed
        $currentDate = Carbon::now();
        $timeStart = microtime(true);
        Log::info('===========');
        Log::info($currentDate . ': AFTER ' . $timeStart);

        //kod po
        $timeEnd = microtime(true);


        $response = $next($request);

        Log::info($currentDate . ': AFTER ' . $timeEnd);
        Log::info($currentDate . ': RESULT ' . ($timeEnd-$timeStart));

        return $response;

    }
}
