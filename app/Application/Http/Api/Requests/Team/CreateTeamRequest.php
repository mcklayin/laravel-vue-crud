<?php

namespace App\Application\Http\Api\Requests\Team;

use App\Domain\Team\DataTransferObjects\CreateTeamDTO;
use Illuminate\Foundation\Http\FormRequest;

class CreateTeamRequest extends FormRequest
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
        return [
            'name' => 'required|string'
        ];
    }

    /**
     * @return CreateTeamDTO
     */
    public function getDto(): CreateTeamDTO
    {
        return CreateTeamDTO::fromRequest($this);
    }
}
