<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'user_id',
    ];

    // Optioneel: relatie met User-model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
