<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = config('seeder.cities');
        $data = [];
        foreach ($locations as $location) {
            $data[] = ['name' => $location['city_name']];
            
        }
        Location::insert($data);
    }
}
