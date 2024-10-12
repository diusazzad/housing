<?php

namespace Database\Factories;

use App\Models\Amenity;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Amenity>
 */
class AmenityFactory extends Factory
{
    protected $model = Amenity::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'project_id' => Project::factory(),
            'amenity_name' => $this->faker->word . ' Facility',
            'description' => $this->faker->sentence,
        ];
    }
}
