<?php

use Illuminate\Database\Seeder;

use App\Models\Brand;
use App\Models\GraphicType;
use App\Models\GraphicSerie;
use App\Models\GraphicsCard;
use App\Models\HashrateGraphic;

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

        GraphicType::create([
            'brand_id' => 2,
            'name' => 'TITAN',
            'description' => 'TITAN'
        ]);

        GraphicType::create([
            'brand_id' => 2,
            'name' => 'GeForce',
            'description' => 'GeForce'
        ]);

        GraphicSerie::create([
            'graphic_type_id' => 2,
            'name' => 'GeForce 10 Series',
            'description' => 'GeForce 10 Series'
        ]);

        GraphicsCard::create([
            'graphic_serie_id' => 1,
            'name' => ' ASUS GeForce GTX 1050 Ti DUAL-GTX1050TI-O4G 4GB GDDR5 PCI-EXP',
            'consumption' => '75',
            'description' => ' ASUS GTX 1050 Ti 4GB GDDR5'
        ]);

        GraphicsCard::create([
            'graphic_serie_id' => 1,
            'name' => 'Galax GeForce GTX 1050 Ti EXOC 4GB GDDR5 50IQH8DVN6EC PCI-EXP',
            'consumption' => '75',
            'description' => 'Galax GTX 1050 Ti EXOC 4GB GDDR5'
        ]);

        GraphicsCard::create([
            'graphic_serie_id' => 1,
            'name' => 'GIGABYTE GEFORCE GTX 1060 WINDFORCE OC 6G GV-N1060WF2OC-6GD GDDR5 PCI-EXP',
            'consumption' => '120',
            'description' => 'GIGABYTE GTX 1060 WINDFORCE OC 6G'
        ]);

        HashrateGraphic::create([
            'state' => 'stock',
            'hashrate' => '12.03',
            'graphics_card_id' => 1,
            'coin_id' => 1
        ]);

        HashrateGraphic::create([
            'state' => 'oc',
            'hashrate' => '15.03',
            'graphics_card_id' => 1,
            'coin_id' => 1
        ]);

        HashrateGraphic::create([
            'state' => 'stock',
            'hashrate' => '12.03',
            'graphics_card_id' => 2,
            'coin_id' => 1
        ]);

        HashrateGraphic::create([
            'state' => 'oc',
            'hashrate' => '15.03',
            'graphics_card_id' => 2,
            'coin_id' => 1
        ]);

        HashrateGraphic::create([
            'state' => 'stock',
            'hashrate' => '19.2',
            'graphics_card_id' => 3,
            'coin_id' => 1
        ]);

        HashrateGraphic::create([
            'state' => 'oc',
            'hashrate' => '24.4',
            'graphics_card_id' => 3,
            'coin_id' => 1
        ]);
    }
}
