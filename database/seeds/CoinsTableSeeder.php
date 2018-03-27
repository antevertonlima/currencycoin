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
        Algorithm::create([
            'name' => 'Ethash',
            'measure' => 'mh/s',
            'description' => 'DaggerHashimoto'
        ]);

        Algorithm::create([
            'name' => 'Equihash',
            'measure' => 'sol/s',
            'description' => 'Equihash'
        ]);

        Algorithm::create([
            'name' => 'CryptoNight',
            'measure' => 'h/s',
            'description' => 'CryptoNight'
        ]);

        Coin::create([
            'name' => 'Ethereum',
            'abbreviation' => 'eth',
            'description' => 'DaggerHashimoto',
            'algorithm_id' => 1
        ]);

        Coin::create([
            'name' => 'Zcash',
            'abbreviation' => 'zec',
            'description' => 'Equihash',
            'algorithm_id' => 2
        ]);

        Coin::create([
            'name' => 'Monero',
            'abbreviation' => 'xmr',
            'description' => 'CryptoNight',
            'algorithm_id' => 3
        ]);
    }
}
