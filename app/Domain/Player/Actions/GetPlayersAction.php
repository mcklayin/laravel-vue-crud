<?php

namespace App\Domain\Player\Actions;

use App\Domain\Player\Models\Player;

class GetPlayersAction
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
        return Player::all();
    }
}
