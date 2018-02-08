<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class BaseController extends Controller
{
    protected $data;

    public function __construct()
    {
        $this->data = new \stdClass();
    }

    public function getServices($method = 'GET', $url = "https://api.fixer.io/latest?base=USD&symbols=BRL")
    {
        $client = new Client();
        $request = $client->request($method, $url);
        $response = $request->getBody();
        return json_decode($response->getContents());
    }

    public function getNanoPoolGeneral($coin,$wallet_address)
    {
        $general = \Nanopool::setType($coin)->user($wallet_address)->data;
        return $general;
    }

    public function getNanoPoolPayments($coin,$wallet_address)
    {
        return \Nanopool::setType($coin)->payments($wallet_address)->data;
    }

    public function getNanoPoolCalculator($coin,$hashrate)
    {
        return \Nanopool::setType($coin)->calculator($hashrate)->data;
    }

    public function calculator($coin,$hashrate)
    {
        $estimativa = $this->getNanoPoolCalculator($coin,$hashrate);
        return json_encode($estimativa);
    }
    public function payments($coin,$wallet_address)
    {
        $estimativa = $this->getNanoPoolPayments($coin,$wallet_address);
        return json_encode($estimativa);
    }
    public function general($coin,$wallet_address)
    {
        $estimativa = $this->getNanoPoolGeneral($coin,$wallet_address);
        return json_encode($estimativa);
    }
}
