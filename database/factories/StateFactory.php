<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\State;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\State>
 */
class StateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->randomElement(['blue', 'green', 'red', 'yellow']);
        $text = $this->faker->sentence();

        return [
            'name' => $name,
            'text' => $text
        ];
    }
}
