<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Characters;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class GameController extends Controller
{


    public function create()
    {
        $characters = Characters::all();
        $game = Game::find(session('game_id'));  // toevoegen

        return view('game', compact('characters', 'game'));  // $game meesturen
    }


    public function whogame()
    {
        $game = Game::find(session('game_id'));
        $characters = Characters::all();
        return view('whogame', compact('game', 'characters'));
    }



    public function guess(Request $request)
    {
        $game = Game::find(session('game_id'));
        if (!$game) {
            return back()->with('message', 'Geen game gevonden.');
        }

        $guessId = $request->input('player1Choice');
        $userId = auth()->id();

        if (($game->turn && $game->player1_id != $userId) || (!$game->turn && $game->player2_id != $userId)) {
            return back()->with('message', 'Het is niet jouw beurt.');
        }

        if ($userId == $game->player1_id) {
            $targetId = $game->player2Choice_id;
            $winnerId = $game->player1_id;
            $loserId = $game->player2_id;
        } else {
            $targetId = $game->player1Choice_id;
            $winnerId = $game->player2_id;
            $loserId = $game->player1_id;
        }

        if ($guessId == $targetId) {

            User::where('id', $winnerId)->increment('wins');
            User::where('id', $loserId)->increment('losses');


            // Delete game
            $game->delete();

            return redirect()->route('whogame')->with('message', 'Goed geraden! Jij hebt gewonnen!');
        } else {
            $game->turn = !$game->turn;
            $game->save();

            return back()->with('message', 'Fout! Beurt wisselt.');
        }
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
