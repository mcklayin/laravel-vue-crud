<?php

namespace App\Domain\Team\Actions;

use App\Domain\Team\Models\Team;

class GetTeamAction
{

    /**
     * @var Team
     */
    private $team;

    /**
     * Create a new action instance.
     *
     * @param Team $team
     *
     * @return void
     */
    public function __construct(Team $team)
    {
        $this->team = $team;
    }

    /**
     * Execute the action.
     *
     * @return mixed
     */
    public function execute()
    {
        return $this->team;
    }
}
