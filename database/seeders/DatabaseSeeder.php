<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\MembreSeeder;
use Database\Seeders\NatureSeeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\TresorierSeeder;
use Database\Seeders\CotisationSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        $tresorier = User::create([

            'email' => 'test@example.com',
            'password' => Hash::make('secret'),
        ]);

        $this->call([
            RoleSeeder::class,
            NatureSeeder::class,
            TresorierSeeder::class,
            MembreSeeder::class,
            CotisationSeeder::class,
        ]);

        $tresor = Role::where('name', 'Tresorier')->first();
        $tresorier->assignRole([$tresor->id]);
    }
}
