<?php

use Illuminate\Database\Seeder;
use App\Models\Algorithm;
use App\Models\Coin;

class CoinsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Algorithm::class, 25)->create()->each(function ($u) {
            $u->coins()->save(factory(Coin::class)->make());
        });
    }
}
