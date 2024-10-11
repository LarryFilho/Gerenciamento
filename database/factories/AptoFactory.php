<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Apto;

class AptoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'unidade' => fake()->unique()->numberBetween(1, 15),
        ];
    }
}
