<?php

namespace App\Domain\Team\DataTransferObjects;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;
use App\Contracts\DataTransferObject\DataTransferObject as DataTransferObjectInterface;

class CreateTeamDTO extends DataTransferObject implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    public $name;

    public static function fromRequest(Request $request): self
    {
        return new self([
             'name' => $request->get('name'),
        ]);
    }
}
