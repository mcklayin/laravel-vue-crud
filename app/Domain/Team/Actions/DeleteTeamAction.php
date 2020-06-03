<?php

namespace App\Domain\Team\Actions;

use App\Domain\Team\DataTransferObjects\DeleteTeamDTO;
use App\Domain\Team\Models\Team;

class DeleteTeamAction
{
    /**
     * @var DeleteTeamDTO
     */
    private $data;

    /**
     * Create a new action instance.
     *
     * @param DeleteTeamDTO $dataObject
     *
     * @return void
     */
    public function __construct(DeleteTeamDTO $dataObject)
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
        $team = Team::findOrFail($this->data['id']);
        $team->delete();

        return true;
    }
}
