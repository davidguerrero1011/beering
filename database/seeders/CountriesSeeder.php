<?php

namespace Database\Seeders;

use App\Models\Countries;
use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = ['Colombia', 'Argentina', 'Venezuela', 'Chile', 'Brasil', 'Uruguay', 'Bolivia', 'Mexico', 'Paraguay', 'Estados Unidos'];
        foreach ($countries as $country) {
            Countries::insert(['name' => $country]);
        }
    }
}
