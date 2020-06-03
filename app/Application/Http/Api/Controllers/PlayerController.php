<?php

namespace App\Application\Http\Api\Controllers;

use App\Domain\Player\Models\Player;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        $company = Player::create($request->all());
        return $company;
    }

    public function update(Request $request, $id)
    {
        $company = Player::findOrFail($id);
        $company->update($request->all());

        return $company;
    }
}
