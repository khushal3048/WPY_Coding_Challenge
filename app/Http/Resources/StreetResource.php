<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CarResource;

class StreetResource extends JsonResource
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
            'street_id' => $this->id,
            'street_name' => $this->name,
            'cars' => CarResource::collection($this->cars)
        ];
    }
}
