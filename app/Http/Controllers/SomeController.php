<?php

namespace App\Http\Controllers;

class SomeController extends BaseController
{
    /**
     * @param string $coin
     * @return mixed
     */

    public function index()
    {
        $sel_coin = 1;

        $coin = ($sel_coin == 1) ? 'eth':'zec';
        $wallet_address = ($sel_coin == 1) ? '0x89B346710d578679E44A5678a4f7F35472b24814':'t1LFzpH46orZNPR5d9dSyENeYJqb2sysvYu';

        $dolar_currency = $this->getServices()->rates->BRL;
        $coin_currency = $this->getServices('GET', "https://api.cryptonator.com/api/full/".$coin."-usd")->ticker->price;

        $general = $this->getNanoPoolGeneral($coin,$wallet_address);
        $pagamentos = $this->getNanoPoolPayments($coin,$wallet_address);

        $vl_pagamento_tot = null;
        foreach ($pagamentos as $pagamento){
            $vl_pagamento_tot = $vl_pagamento_tot + $pagamento->amount;
        }

        $media_hash = round(($general->avgHashrate->h1 + $general->avgHashrate->h3 +
                $general->avgHashrate->h6 + $general->avgHashrate->h12 +
                $general->avgHashrate->h24) / 5,2);

        $calc_hash = ($media_hash < $general->avgHashrate->h24) ? $general->avgHashrate->h24:$media_hash;
        //$calc_hash = 478;

        $calculate = null;
        if($general->avgHashrate->h24 != 0.0){
            $calculate = $this->getNanoPoolCalculator($coin,$calc_hash);
        }

        $sol_mh_hash = ($coin == 'eth') ? 'mh/s':'sol/s(h/s)';

        $min_saque = ($coin == 'eth') ? 0.050000000: 0.01000000;
        $minerado = number_format(($general->balance/$min_saque) * 100,2);

        if($calculate != null){
            $falta_dias_saque = round(($min_saque - $general->balance)/$calculate->day->coins);
            $dias_saque = round($min_saque/$calculate->day->coins);
            $calculator = [
                'per_minute' => [
                    'titulo' => 'Por Minuto',
                    'coins' => $calculate->minute->coins,
                    'btc'   => $calculate->minute->bitcoins,
                    'dolar' => round($calculate->minute->dollars,2),
                    'real'  => 'R$ '.round($calculate->minute->dollars * $dolar_currency,2),
                ],
                'per_hour' => [
                    'titulo' => 'Por Hora',
                    'coins' => number_format($calculate->hour->coins,8),
                    'btc'   => number_format($calculate->hour->bitcoins,8),
                    'dolar' => round($calculate->hour->dollars,2),
                    'real'  => 'R$ '.round($calculate->hour->dollars * $dolar_currency,2),
                ],
                'per_day' => [
                    'titulo' => 'Por dia',
                    'coins' => number_format($calculate->day->coins,8),
                    'btc'   => number_format($calculate->day->bitcoins,8),
                    'dolar' => round($calculate->day->dollars,2),
                    'real'  => 'R$ '.round($calculate->day->dollars * $dolar_currency,2),
                ],
                'per_week' => [
                    'titulo' => 'Por semana',
                    'coins' => number_format($calculate->week->coins,8),
                    'btc'   => number_format($calculate->week->bitcoins,8),
                    'dolar' => round($calculate->week->dollars,2),
                    'real'  => 'R$ '.round($calculate->week->dollars * $dolar_currency,2),
                ],
                'per_month' => [
                    'titulo' => 'Por mes',
                    'coins' => number_format($calculate->month->coins,8),
                    'btc'   => number_format($calculate->month->bitcoins,8),
                    'dolar' => round($calculate->month->dollars,2),
                    'real'  => 'R$ '.round($calculate->month->dollars * $dolar_currency,2),
                ],
            ];
        }else{
            $falta_dias_saque = round(0);
            $dias_saque = round(0,2);
            $calculator = [
                'per_minute' => [
                    'titulo' => 'Por Minuto',
                    'coins' => number_format(0,8),
                    'btc'   => number_format(0,8),
                    'dolar' => round(0,2),
                    'real'  => 'R$ '.round(0,2),
                ],
                'per_hour' => [
                    'titulo' => 'Por Hora',
                    'coins' => number_format(0,8),
                    'btc'   => number_format(0,8),
                    'dolar' => round(0,2),
                    'real'  => 'R$ '.round(0,2),
                ],
                'per_day' => [
                    'titulo' => 'Por dia',
                    'coins' => number_format(0,8),
                    'btc'   => number_format(0,8),
                    'dolar' => round(0,2),
                    'real'  => 'R$ '.round(0,2),
                ],
                'per_week' => [
                    'titulo' => 'Por semana',
                    'coins' => number_format(0,8),
                    'btc'   => number_format(0,8),
                    'dolar' => round(0,2),
                    'real'  => 'R$ '.round(0,2),
                ],
                'per_month' => [
                    'titulo' => 'Por mes',
                    'coins' => number_format(0,8),
                    'btc'   => number_format(0,8),
                    'dolar' => round(0,2),
                    'real'  => 'R$ '.round(0,2),
                ],
            ];
        }

        return view('nanopool',compact('coin','dolar_currency','vl_pagamento_tot','media_hash','sol_mh_hash','general','min_saque','pagamentos','coin_currency','minerado','dias_saque','falta_dias_saque','calculator'));
    }
}