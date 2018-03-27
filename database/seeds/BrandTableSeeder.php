<?php

use Illuminate\Database\Seeder;

use App\Models\Brand;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create([
            'name' => 'AMD',
            'description' => 'Randeon, R9, R7, RX'
        ]);

        Brand::create([
            'name' => 'NVIDIA',            
            'description' => 'GT, GTX, TITAN, TESLA'
        ]);
    }
}
