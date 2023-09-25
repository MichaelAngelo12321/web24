<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'NIP' => $this->nip,
            'adres' => $this->adres,
            'miasto' => $this->miasto,
            'kod_pocztowy' => $this->kod_pocztowy,
            'created_at' => $this->created_at,
        ];
    }
}
