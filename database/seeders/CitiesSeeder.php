<?php

namespace Database\Seeders;

use App\Models\Cities;
use App\Models\Countries;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $country = Countries::where('name', 'Colombia')->first(); 
        $cities = ['Bogota', 'Cali', 'Manizales', 'Pereira', 'Medellin', 'Bucaramanga', 'Cucuta', 'Barranquilla', 'Santa Marta', 'Boyaca', 'Tolima'];
        foreach ($cities as $city) {
            Cities::insert(['name' => $city, 'country_id' => $country->id]);
        }
    }
}
