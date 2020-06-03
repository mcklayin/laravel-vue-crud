<?php

namespace App\Application\Http\Api\Requests\Team;

use App\Domain\Team\DataTransferObjects\DeleteTeamDTO;
use Illuminate\Foundation\Http\FormRequest;

class DeleteTeamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }

    /**
     * @return DeleteTeamDTO
     */
    public function getDto(): DeleteTeamDTO
    {
        return DeleteTeamDTO::fromRequest($this);
    }
}
