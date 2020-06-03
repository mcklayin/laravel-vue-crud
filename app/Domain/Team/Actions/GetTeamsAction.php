<?php

namespace App\Domain\Team\Actions;

use App\Domain\Team\Models\Team;

class GetTeamsAction
{

    /**
     * Create a new action instance.
     *
     *
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Execute the action.
     *
     * @return mixed
     */
    public function execute()
    {
        return Team::all();
    }
}
