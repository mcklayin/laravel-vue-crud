<?php

namespace App\Domain\Team\Actions;

use App\Domain\Team\DataTransferObjects\CreateTeamDTO;
use App\Domain\Team\Models\Team;

class CreateTeamAction
{
    /**
     * @var CreateTeamDTO
     */
    private $data;

    /**
     * Create a new action instance.
     *
     * @param CreateTeamDTO $dataObject
     *
     * @return void
     */
    public function __construct(CreateTeamDTO $dataObject)
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
        return Team::create($this->data->toArray());
    }
}
