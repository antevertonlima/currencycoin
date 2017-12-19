<?php

namespace App\Http\Controllers;

use CoinMc;

class SomeController extends Controller
{
    public function index()
    {
    	
        // Get CoinMarketCap tickers sorting by 24h volume
		//return $this->coinmc->ticker();
		return CoinMc::ticker();

		// Get ticker for specific coin
		//$coin = 'bitcoin';
		//$coinmc->tickerCoin($coin);
		//return CoinMc::tickerCoin('bitcoin');

		// Get global data
		//return $coinmc->globalData();
		//return CoinMc::globalData();
    }
}