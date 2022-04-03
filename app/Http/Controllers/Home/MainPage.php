<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MainPage extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();

        return view('home.main',[
            'user'=>$user,

        ]);
    }
}
