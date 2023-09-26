<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Company;

class CompanyFactory extends Factory
{
    protected $model = Company::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'nip' => $this->faker->numerify('##########'),
            'adress' => $this->faker->address,
            'city' => $this->faker->city,
            'post_code' => $this->faker->postcode,
        ];
    }
}
