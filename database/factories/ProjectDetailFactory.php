<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProjectDetail>
 */
class ProjectDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'project_id' => 1,
            'project_specification' => $this->faker->text(),
            'locality_advantage' => $this->faker->text(),
            'review' => $this->faker->text(),
            'project_brochure' => $this->faker->url(),
            'project_payment_plan' => $this->faker->text(),
            'project_offer' => $this->faker->text(),
            'image_path' => $this->faker->imageUrl(), // Generates a random image URL
        ];
    }
}
