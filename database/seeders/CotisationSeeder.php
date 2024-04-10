<?php

namespace Database\Seeders;

use App\Models\Cotisation;
use Illuminate\Database\Seeder;

class CotisationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Cotisation::factory()->count(10)->create();
    }
}
