<?php

namespace Database\Seeders;

use App\Models\ProjectDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProjectDetail::factory()->count(20)->create();
    }
}
