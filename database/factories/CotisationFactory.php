<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cotisation>
 */
class CotisationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'montant' => $this->faker->numberBetween(2000, 200000),
            'tresorier_id' => $this->faker->numberBetween(1, 3),
            'membre_id' => $this->faker->numberBetween(1, 3),
            'nature_id' => $this->faker->numberBetween(1, 3),
        ];
    }
}
