<?php

namespace App\Domain\Player\Actions;

use App\Domain\Player\DataTransferObjects\CreatePlayerDTO;
use App\Domain\Player\Models\Player;

class CreatePlayerAction
{
    /**
     * @var CreatePlayerDTO
     */
    private $data;

    /**
     * Create a new action instance.
     *
     * @param CreatePlayerDTO $dataObject
     *
     * @return void
     */
    public function __construct(CreatePlayerDTO $dataObject)
    {
        // Prepare the action for execution injection.
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
        return Player::create($this->data->toArray());
    }
}
