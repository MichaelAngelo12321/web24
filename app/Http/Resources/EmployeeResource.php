<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'firstName' => $this->imie,
            'surName' => $this->nazwisko,
            'email' => $this->email,
            'phone_number' => $this->numer_telefonu,
        ];
    }
}
