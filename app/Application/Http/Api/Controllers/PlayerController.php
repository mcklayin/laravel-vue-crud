<?php

namespace App\Application\Http\Api\Controllers;

use App\Application\Http\Api\Requests\Player\CreatePlayerRequest;
use App\Application\Http\Api\Requests\Player\UpdatePlayerRequest;
use App\Application\Http\Api\Resources\Player\PlayerCollection;
use App\Application\Http\Api\Resources\Player\PlayerResource;
use App\Domain\Player\Actions\CreatePlayerAction;
use App\Domain\Player\Actions\GetPlayerAction;
use App\Domain\Player\Actions\GetPlayersAction;
use App\Domain\Player\Actions\UpdatePlayerAction;
use App\Domain\Player\Models\Player;

class PlayerController extends Controller
{

    public function index()
    {
        $gePlayersAction = new GetPlayersAction();
        return new PlayerCollection($gePlayersAction->execute());
    }

    public function show(Player $player)
    {
        $getPlayerAction = new GetPlayerAction($player);
        return new PlayerResource($getPlayerAction->execute());
    }

    public function update(UpdatePlayerRequest $request, Player $player)
    {
        $updatePlayerAction = new UpdatePlayerAction($player, $request->getDto());
        $player = $updatePlayerAction->execute();

        return $player;
    }

    public function store(CreatePlayerRequest $request)
    {
        $createPlayerAction = new CreatePlayerAction($request->getDto());
        $player = $createPlayerAction->execute();

        return $player;
    }
}
