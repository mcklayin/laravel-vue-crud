<?php

namespace App\Application\Http\Api\Controllers;

use App\Application\Http\Api\Resources\Team\TeamResource;
use App\Domain\Team\Actions\GetTeamAction;
use App\Domain\Team\Models\Team;

class PlayerTeamController extends Controller
{
    public function index(Team $team)
    {
        $team->load('players');

        $getTeamAction = new GetTeamAction($team);

        return new TeamResource($getTeamAction->execute());
    }
}
