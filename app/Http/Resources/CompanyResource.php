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
            'adress' => $this->adress,
            'city' => $this->city,
            'post_code' => $this->post_code,
            'employees' => $this->employees->map(function ($employee) {
                return [
                    'firstName' => $employee->firstName,
                    'surName' => $employee->surName,
                    'email' => $employee->email,
                    'phone_number' => $employee->phone_number,
                ];
            }),
        ];
    }
}
