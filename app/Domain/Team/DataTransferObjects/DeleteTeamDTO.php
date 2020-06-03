<?php

namespace App\Domain\Team\DataTransferObjects;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;
use App\Contracts\DataTransferObject\DataTransferObject as DataTransferObjectInterface;

class DeleteTeamDTO extends DataTransferObject implements DataTransferObjectInterface
{

    /**
     * @var int
     */
    public $id;

    public static function fromRequest(Request $request): self
    {
        return new self([
             'id' => $request->get('id'),
        ]);
    }
}
