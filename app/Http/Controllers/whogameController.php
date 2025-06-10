<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Characters;
use Illuminate\Http\Request;

class whogameController extends Controller
{
    public function index()
    {
        $game = Game::find(session('game_id'));
        $characters = Characters::all();

        return view('whogame', compact('game', 'characters'));
    }
}
