<?php

namespace App\Domain\Team\Models;

use App\Domain\Player\Models\Player;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name'
    ];

    public function players()
    {
        return $this->hasMany(Player::class);
    }
}
