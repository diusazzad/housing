<?php

namespace Database\Seeders;

use App\Models\Builder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BuilderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Builder::factory()->count(20)->create();
    }
}
