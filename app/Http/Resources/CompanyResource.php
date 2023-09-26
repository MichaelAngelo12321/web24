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
            'adress' => $this->adres,
            'city' => $this->miasto,
            'post_code' => $this->kod_pocztowy,
            'employees' => $this->employeers->map(function ($employee) {
                return [
                    'firstName' => $employee->imie,
                    'surName' => $employee->nazwisko,
                    'email' => $employee->email,
                    'phone_number' => $employee->numer_telefonu,
                ];
            }),
        ];
    }
}
