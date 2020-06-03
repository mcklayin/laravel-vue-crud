<?php

namespace App\Application\Http\Api\Controllers;

use App\Application\Http\Api\Requests\Team\DeleteTeamRequest;
use App\Application\Http\Api\Requests\Team\UpdateTeamRequest;
use App\Domain\Team\Actions\CreateTeamAction;
use App\Domain\Team\Actions\UpdateTeamAction;
use App\Domain\Team\Actions\DeleteTeamAction;
use App\Domain\Team\Models\Team;
use App\Application\Http\Api\Requests\Team\CreateTeamRequest;

class TeamController extends Controller
{
    public function index()
    {
        return Team::all();
    }

    public function show(Team $team)
    {
        return $team;
    }

    public function update(UpdateTeamRequest $request, Team $team)
    {
        $updateTeamAction = new UpdateTeamAction($team, $request->getDto());
        $team = $updateTeamAction->execute();

        return $team;
    }

    public function store(CreateTeamRequest $request)
    {
        $createTeamAction = new CreateTeamAction($request->getDto());
        $team = $createTeamAction->execute();

        return $team;
    }

    public function destroy(DeleteTeamRequest $request)
    {
        $deleteTeamAction = new DeleteTeamAction($request->getDto());
        $result = $deleteTeamAction->execute();

        return response()->json(['done' => $result]);
    }
}
