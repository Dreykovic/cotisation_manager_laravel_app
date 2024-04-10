<?php

namespace Database\Seeders;

use App\Models\Tresorier;
use Illuminate\Database\Seeder;

class TresorierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tresorier::factory()->count(10)->create();
    }
}
