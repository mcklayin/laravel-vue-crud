<?php

namespace App\Application\Http\Api\Controllers;

use App\Application\Http\Api\Requests\Player\CreatePlayerRequest;
use App\Application\Http\Api\Requests\Player\UpdatePlayerRequest;
use App\Domain\Player\Actions\CreatePlayerAction;
use App\Domain\Player\Actions\UpdatePlayerAction;
use App\Domain\Player\Models\Player;

class PlayerController extends Controller
{
    /**
     * @return Player[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Player::all();
    }

    public function show(Player $player)
    {
        return $player;
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
