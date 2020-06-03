<?php

namespace App\Domain\Player\Actions;

use App\Domain\Player\Models\Player;

class GetPlayerAction
{

    /**
     * @var Player
     */
    private $player;

    /**
     * Create a new action instance.
     *
     * @param Player $player
     *
     * @return void
     */
    public function __construct(Player $player)
    {
        $this->player = $player;
    }

    /**
     * Execute the action.
     *
     * @return mixed
     */
    public function execute()
    {
        return $this->player;
    }
}
