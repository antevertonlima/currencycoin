<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coin;

class CoinController extends Controller
{
    public function index() {
        $coins = Coin::paginate(15);
        return view('partials.coins', compact('coins'));
    }
}
