<?php

namespace App\Domain\Player\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'first_name',
        'last_name'
    ];
}
