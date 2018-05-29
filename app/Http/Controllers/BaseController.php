<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class BaseController extends Controller
{
    protected $api_key; 
    protected $api_secret;
    protected $private_url = "https://braziliex.com/api/v1/private";
    protected $public_url = "https://braziliex.com/api/v1/public/";
    
    public function __construct() 
    {
            $this->api_key = env('BRAZILIEX_API_KEY');
            $this->api_secret = env('BRAZILIEX_API_SECRET');
    }
            
    private function send_request($type = "private", array $req = array()) {
        if ($type == "private") {
            // API settings
            $key = $this->api_key;
            $secret = $this->api_secret;
            // Generate nonce
            $req['nonce'] = time(); 
        
            // generate the POST data string
            $post_data = http_build_query($req, '', '&');
            $sign = hash_hmac('sha512', $post_data, $secret);
        
            // generate the extra headers
            $headers = array(
                'Key: '.$key,
                'Sign: '.$sign,
            );

            // curl handle (initialize if required)
            static $ch = null;
            if (is_null($ch)) {
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; PHP/'.phpversion().')'
                );
            }
            curl_setopt($ch, CURLOPT_URL, $this->private_url);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

            // send request
            $res = curl_exec($ch);
            if ($res === false) throw new Exception('Curl error: '.curl_error($ch));
            return $res;
        }else{
            // curl handle (initialize if required)
            static $ch = null;
            if (is_null($ch)) {
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; PHP/'.phpversion().')'
                );
            }
            curl_setopt($ch, CURLOPT_URL, $this->public_url.$req['command']);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

            // send request
            $res = curl_exec($ch);
            if ($res === false) throw new Exception('Curl error: '.curl_error($ch));
            return $res;
        }
    }



    public function balance() {
        return $this->send_request(
            "private",
            array(
                'command' => 'balance'
            )
        );
    }

    public function currencys($command = 'ticker', $coin = null) {
        if ($coin != null){
            $command = $command."/".$coin."_brl";
        }
        return $this->send_request(
            "public",
            array(
                'command' => $command
            )
        );
    }

    public function complete_balance() {
        return $this->send_request(
            "private",
            array(
                'command' => 'complete_balance'
            )
        );
    }               
    
    public function open_orders($market) {               
        return $this->send_request(
            "private",
            array(
                'command' => 'open_orders',
                'market' => strtolower($market)
            )
        );
    }

    public function trade_history($market) {               
        return $this->send_request(
            "private",
            array(
                'command' => 'trade_history',
                'market' => strtolower($market)
            )
        );
    }

    public function deposit_address($currency) {               
        return $this->send_request(
            "private",
            array(
                'command' => 'deposit_address',
                'currency' => strtolower($currency)
            )
        );
    }

    public function sell($market, $amount, $price) {               
        return $this->send_request(
            "private",
            array(
                'command' => 'sell',
                'amount' => $amount,
                'price' => $price,
                'market' => strtolower($market)
            )
        );
    }  

    public function buy($market, $amount, $price) {               
        return $this->send_request(
            "private",
            array(
                'command' => 'buy',
                'amount' => $amount,
                'price' => $price,
                'market' => strtolower($market)
            )
        );
    }

    public function cancel_order($market, $order) {               
        return $this->send_request(
            "private",
            array(
                'command' => 'cancel_order',
                'order_number' => $order,
                'market' => strtolower($market)
            )
        );
    }   
}
