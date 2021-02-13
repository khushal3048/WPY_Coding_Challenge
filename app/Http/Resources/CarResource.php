<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PersonResource;

class CarResource extends JsonResource
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
            'license_plate' => $this->license_plate,
            'brand' => $this->brand,
            'color' => $this->color,
            'owners' => PersonResource::collection($this->whenLoaded('owners')) 
        ];
    }
}
