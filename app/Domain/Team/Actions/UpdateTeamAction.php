<?php

namespace App\Domain\Team\Actions;

use App\Domain\Team\DataTransferObjects\UpdateTeamDTO;
use App\Domain\Team\Models\Team;

class UpdateTeamAction
{
    /**
     * @var Team
     */
    private $team;
    /**
     * @var UpdateTeamDTO
     */
    private $data;

    /**
     * Create a new action instance.
     *
     * @param Team $team
     * @param UpdateTeamDTO $dataObject
     *
     * @return void
     */
    public function __construct(Team $team, UpdateTeamDTO $dataObject)
    {
        // Prepare the action for execution injection.
        $this->team = $team;
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
        $this->team->update($this->data->toArray());

        return $this->team;
    }
}
