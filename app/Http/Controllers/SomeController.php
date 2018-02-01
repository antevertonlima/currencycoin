<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class SomeController extends Controller
{
    /**
     * @param string $coin
     * @return mixed
     */

    public function index($coin, $wallet_address_eth)
    {
        $client = new Client();
        $request = $client->request('GET', "https://api.fixer.io/latest?base=USD&symbols=BRL");
        $response = $request->getBody();

        $client_coin = new Client();
        $request_coin = $client_coin->request('GET', "https://api.cryptonator.com/api/full/".$coin."-usd");
        $response_coin = $request_coin->getBody();

        $dolar_currency = json_decode($response->getContents())->rates->BRL;
        $coin_currency = json_decode($response_coin->getContents())->ticker->price;

        $general = \Nanopool::setType($coin)->user($wallet_address_eth);
        $pagamentos = \Nanopool::setType($coin)->payments($wallet_address_eth);
        //$pagamentos_cash = "R$ ".($pagamentos * $coin_currency) * $dolar_currency;
        $calculate = \Nanopool::setType($coin)->calculator($general->data->avgHashrate->h24);

        $min_saque = 0.20000000;
        $minerado = number_format(($general->data->balance/$min_saque) *100,2);
        $dias_saque = round($min_saque/$calculate->data->day->coins);
        $falta_dias_saque = round(($min_saque - $general->data->balance)/$calculate->data->day->coins);

        $calculator = [
            'per_minute' => [
                'titulo' => 'Por Minuto',
                'coins' => $calculate->data->minute->coins,
                'btc'   => $calculate->data->minute->bitcoins,
                'dolar' => 'U$ '.round($calculate->data->minute->dollars,2),
                'real'  => 'R$ '.round($calculate->data->minute->dollars * $dolar_currency,2),
            ],
            'per_hour' => [
                'titulo' => 'Por Hora',
                'coins' => number_format($calculate->data->hour->coins,8),
                'btc'   => number_format($calculate->data->hour->bitcoins,8),
                'dolar' => 'U$ '.round($calculate->data->hour->dollars,2),
                'real'  => 'R$ '.round($calculate->data->hour->dollars * $dolar_currency,2),
            ],
            'per_day' => [
                'titulo' => 'Por dia',
                'coins' => number_format($calculate->data->day->coins,8),
                'btc'   => number_format($calculate->data->day->bitcoins,8),
                'dolar' => 'U$ '.round($calculate->data->day->dollars,2),
                'real'  => 'R$ '.round($calculate->data->day->dollars * $dolar_currency,2),
            ],
            'per_week' => [
                'titulo' => 'Por semana',
                'coins' => number_format($calculate->data->week->coins,8),
                'btc'   => number_format($calculate->data->week->bitcoins,8),
                'dolar' => 'U$ '.round($calculate->data->week->dollars,2),
                'real'  => 'R$ '.round($calculate->data->week->dollars * $dolar_currency,2),
            ],
            'per_month' => [
                'titulo' => 'Por mes',
                'coins' => number_format($calculate->data->month->coins,8),
                'btc'   => number_format($calculate->data->month->bitcoins,8),
                'dolar' => 'U$ '.round($calculate->data->month->dollars,2),
                'real'  => 'R$ '.round($calculate->data->month->dollars * $dolar_currency,2),
            ],
        ];

        //dd($pagamentos->data);

        return view('nanopool',compact('dolar_currency','general','pagamentos','coin_currency','minerado','dias_saque','falta_dias_saque','calculator'));
    }
}