<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['Dueño', 'Admin', 'Meseros', 'Clientes', 'Proveedores'];
        foreach ($roles as $role) {
            Roles::insert(['name' => $role]);
        }
    }
}
