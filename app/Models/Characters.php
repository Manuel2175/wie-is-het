<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Characters extends Model
{
        Protected $fillable = [
            'name',
            'img'
        ];
}
