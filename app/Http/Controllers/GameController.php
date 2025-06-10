<?php

namespace App\Http\Controllers;

use App\Models\Characters;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class GameController extends Controller
{


    public function create()
    {
        $characters = Characters::all();
        return view('game', compact('characters'));

    }
    public function whogame()
    {
        $game = Game::find(session('game_id'));
        return view('whogame', compact('game'));
    }


    public function store(Request $request)
    {
        $game = Game::whereNull('player2_id')->first();

        if ($game) {
            $game->update([
                'player2_id' => auth()->id(),
                'player2Choice_id' => $request->input('player1Choice'),
            ]);
        } else {
            $game = Game::create([
                'player1_id' => auth()->id(),
                'player1Choice_id' => $request->input('player1Choice'),
                'turn' => true,
            ]);
        }


        session(['game_id' => $game->id]);

        return redirect()->route('whogame');
    }


}
