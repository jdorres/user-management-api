<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserAddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'address'    => $this->address,
            'number'     => $this->number,
            'complement' => $this->complement,
            'disctrict'  => $this->disctrict,
            'zipcode'    => $this->zipcode,
            'created_at' => $this->created_at->format("d/m/Y")
        ];
    }
}
