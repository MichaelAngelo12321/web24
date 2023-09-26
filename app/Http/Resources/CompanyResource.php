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
    public function toArray($request): array
    {
        return [
            'name' => $this->name,
            'nip' => $this->nip,
            'adres' => $this->adres,
            'miasto' => $this->miasto,
            'kod_pocztowy' => $this->kod_pocztowy,
            'employeers' => $this->employeers->map(function ($employee) {
                return [
                    'imie' => $employee->imie,
                    'nazwisko' => $employee->nazwisko,
                    'email' => $employee->email,
                    'numer_telefonu' => $employee->numer_telefonu,
                ];
            }),
        ];
    }
}
