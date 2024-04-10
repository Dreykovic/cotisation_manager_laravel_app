<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ensemble des permissins
        $permissions_list = [
            'voir-cotisation',
            'ecrire-cotisation',
            'creer-cotisation',
            'voir-membre',
            'ecrire-membre',
            'creer-membre',
            'voir-nature',
            'ecrire-nature',
            'creer-nature',
        ];
        $membre_permissions_list = [
            'voir-cotisation',
            'ecrire-cotisation',
            'creer-cotisation',
            'voir-membre',
            'ecrire-membre',
            'creer-membre',
            'voir-nature',
            'ecrire-nature',
            'creer-nature',
        ];
        // Création des permission
        foreach ($permissions_list as $permission) {
            Permission::create(['name' => $permission]);
        }
        //Création des roles
        $tresorier = Role::create(['name' => 'Tresorier']);
        $membre = Role::create(['name' => 'Membre']);
        // Récupération des permissions
        $all_permissions = Permission::all();
        $tresorier_permissions = $all_permissions->whereIn('name', $permissions_list);
        $membre_permissions = $all_permissions->whereIn('name', $membre_permissions_list);
        // Synchronisation de chque permission aux roles créés
        $tresorier->syncPermissions($tresorier_permissions);
        $membre->syncPermissions($membre_permissions);
    }
}
