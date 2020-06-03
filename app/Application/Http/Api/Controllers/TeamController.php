<?php

namespace App\Application\Http\Api\Controllers;

use App\Application\Http\Api\Requests\Team\DeleteTeamRequest;
use App\Application\Http\Api\Requests\Team\UpdateTeamRequest;
use App\Domain\Team\Actions\CreateTeamAction;
use App\Domain\Team\Actions\GetTeamAction;
use App\Domain\Team\Actions\GetTeamsAction;
use App\Domain\Team\Actions\UpdateTeamAction;
use App\Domain\Team\Actions\DeleteTeamAction;
use App\Domain\Team\Models\Team;
use App\Application\Http\Api\Requests\Team\CreateTeamRequest;
use App\Application\Http\Api\Resources\Team\TeamCollection;
use App\Application\Http\Api\Resources\Team\TeamResource;

class TeamController extends Controller
{
    public function index()
    {
        $getTeamsAction = new GetTeamsAction();

        return new TeamCollection($getTeamsAction->execute());
    }

    public function show(Team $team)
    {
        $getTeamAction = new GetTeamAction($team);
        return new TeamResource($getTeamAction->execute());
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
