<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainPage extends Controller
{
    public function __invoke(Request $request)
    {
        $user = Auth::user();

        return view('home.main', ['user' => $user]);
    }
}
