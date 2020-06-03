<?php

namespace App\Application\Http\Api\Controllers;

use App\Domain\Team\Models\Team;
use Illuminate\Http\Request;

class PlayerTeamController extends Controller
{
    public function index(Team $team)
    {
        $team->load('players');
        return $team;
    }
}
