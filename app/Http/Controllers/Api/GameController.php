<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use http\Env\Response;
use Illuminate\Http\Request;

class GameController extends Controller
{

    public function index(): Response
    {
        dd('dupa');
        return view('games.list');
    }


    public function store(Request $request)
    {
        //
    }

    public function show(int $game): Response
    {
        return 0;
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
