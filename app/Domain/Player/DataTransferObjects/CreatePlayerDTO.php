<?php

namespace App\Domain\Player\DataTransferObjects;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;
use App\Contracts\DataTransferObject\DataTransferObject as DataTransferObjectInterface;

class CreatePlayerDTO extends DataTransferObject implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    public $first_name;

    /**
     * @var string
     */
    public $last_name;

    /**
     * @var int
     */
    public $team_id;

    public static function fromRequest(Request $request): self
    {

        return new self([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'team_id' => intval($request->get('team_id'))
        ]);
    }
}
