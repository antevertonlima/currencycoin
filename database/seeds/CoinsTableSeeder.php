<?php

use Illuminate\Database\Seeder;
use App\Algorithm;
use App\Coin;

class CoinsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Algorithm::class, 2)->create()->each(function ($u) {
            $u->coins()->save(factory(Coin::class)->make());
        });
    }
}
