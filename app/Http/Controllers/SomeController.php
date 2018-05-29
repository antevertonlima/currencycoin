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
        //$currencys_braziliex = $this->currencys('ticker','eth');
        $currencys_braziliex = null;
        return view('nanopool',compact('currencys_braziliex'));
    }
}