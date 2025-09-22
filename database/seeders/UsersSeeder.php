<?php

namespace Database\Seeders;

use App\Models\Cities;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $city = Cities::where('name', 'Bogota')->first();
        $role = Roles::where('name', 'Dueño')->first();

        User::create([  'name' => 'David', 
                        'last_name' => 'Guerrero', 
                        'birthday' => '1984-01-10', 
                        'cellphone' => (string) '3024786575', 
                        'email' => 'davidguerrero0709@gmail.com', 
                        'address' => 'Calle 65 Sur #73A - 29', 
                        'neightboarhood' => 'Madelena', 
                        'password' => bcrypt('123456789'), 
                        'city_id' => $city->id, 
                        'role_id' => $role->id
                    ]);
    }
}
