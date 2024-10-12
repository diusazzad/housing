<?php

namespace Database\Factories;

use App\Models\Builder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Builder>
 */
class BuilderFactory extends Factory
{
    protected $model = Builder::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(), // Generates a company name
            'contact_info' => $this->faker->phoneNumber(), // Generates a random phone number
            'established_year' => $this->faker->year(), // Generates a random year
            'description' => $this->faker->paragraph(), // Generates a random paragraph
            'website' => $this->faker->url(), // Generates a random URL
        ];
    }
}
