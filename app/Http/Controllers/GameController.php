<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Characters;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class GameController extends Controller
{

//maakt een game aan
    public function create()
    {
        $characters = Characters::all();
        $game = Game::find(session('game_id'));  // toevoegen

        return view('game', compact('characters', 'game'));  // $game meesturen
    }

//als er al een game bestaat zoekt hij naar een geldige
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
            return back()->with('message', 'No game found');
        }

        $guessId = $request->input('player1Choice');
        $userId = auth()->id();

        if (($game->turn && $game->player1_id != $userId) || (!$game->turn && $game->player2_id != $userId)) {
            return back()->with('message', 'Not youre turn');
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

            return redirect()->route('whogame')->with('message', 'Nice job, You won!');
        } else {
            $game->turn = !$game->turn;
            $game->save();

            return back()->with('message', 'wrong');
        }
    }




    public function store(Request $request)
    {
        $game = Game::whereNull('player2_id')->first();

        if ($game) {
            $game->update([
                'player2_id' => auth()->id(),
                'player2Choice_id' => $request->input('player1Choice'),
                'round'=> 1,
            ]);
        } else {
            $game = Game::create([
                'player1_id' => auth()->id(),
                'player1Choice_id' => $request->input('player1Choice'),
                'turn' => true,
                'round'=> 1,
            ]);
        }


        session(['game_id' => $game->id]);

        return redirect()->route('whogame');
    }


}
