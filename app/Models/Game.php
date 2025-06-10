<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public $timestamps = false;

    protected $table = 'games';

    protected $fillable = [
        'player1_id',
        'player2_id',
        'player1Choice_id',
        'player2Choice_id',
        'chat_id',
        'turn',
        'round',
    ];



    public function player1(){
        return $this->belongsTo(User::class);
    }

    public function player2(){
        return $this->belongsTo(User::class);
    }

    public function player1Choice(){
        return $this->belongsTo(Characters::class);
    }

    public function player2Choice(){
        return $this->belongsTo(Characters::class);
    }

    public function chat(){
        return $this->belongsTo(Chat::class);
    }
}
