<?php

namespace App\Application\Http\Api\Requests\Player;

use App\Domain\Player\DataTransferObjects\UpdatePlayerDTO;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePlayerRequest extends FormRequest
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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
        ];
    }

    /**
     * @return UpdatePlayerDTO
     */
    public function getDto(): UpdatePlayerDTO
    {
        return UpdatePlayerDTO::fromRequest($this);
    }
}
