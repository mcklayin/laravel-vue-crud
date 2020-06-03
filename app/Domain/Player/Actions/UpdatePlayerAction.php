<?php

namespace App\Domain\Player\Actions;

use App\Domain\Player\DataTransferObjects\UpdatePlayerDTO;
use App\Domain\Player\Models\Player;

class UpdatePlayerAction
{
    /**
     * @var Player
     */
    private $player;
    /**
     * @var UpdatePlayerDTO
     */
    private $data;

    /**
     * Create a new action instance.
     *
     * @param Player $team
     * @param UpdatePlayerDTO $dataObject
     *
     * @return void
     */
    public function __construct(Player $player, UpdatePlayerDTO $dataObject)
    {
        // Prepare the action for execution injection.
        $this->player = $player;
        $this->data = $dataObject;
    }

    /**
     * Execute the action.
     *
     * @return mixed
     */
    public function execute()
    {
        // The business logic goes here & catch errors
        $this->player->update($this->data->toArray());

        return $this->player;
    }
}
