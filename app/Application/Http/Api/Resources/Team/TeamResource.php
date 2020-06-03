<?php

namespace App\Application\Http\Api\Resources\Team;

use App\Application\Http\Api\Resources\Player\PlayerResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'created_at' => $this->created_at,
            'players' => PlayerResource::collection($this->whenLoaded('players')),
        ];
    }
}