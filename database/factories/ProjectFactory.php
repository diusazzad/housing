<?php

namespace Database\Factories;

use App\Models\Builder;
use App\Models\Locality;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    protected $model = Project::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'locality_id' => Locality::factory(),
            'builder_id' => Builder::factory(),
            'project_name' => $this->faker->word . ' Project',
            'price_range' => $this->faker->randomElement(['₹37.5 L - ₹52.0 L', '₹54.0 L - ₹70.0 L']),
            'bhk_configurations' => $this->faker->randomElement(['1 BHK', '2 BHK', '3 BHK']),
            'carpet_area_range' => $this->faker->randomElement(['407 sq.ft - 550 sq.ft', '600 sq.ft - 800 sq.ft']),
            'rera_registration' => strtoupper($this->faker->bothify('P#####')),
            'possession_date' => $this->faker->date(),
        ];
    }
}
