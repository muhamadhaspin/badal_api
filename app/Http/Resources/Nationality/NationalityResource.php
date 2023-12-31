<?php

namespace App\Http\Resources\Nationality;

use Illuminate\Http\Request;
use App\Http\Resources\Country\CountryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class NationalityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "country" => new CountryResource($this->whenLoaded("country"))
        ];
    }
}
