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
        //$balance_braziliex = $this->balance();
        $balance_braziliex = null;
        return view('nanopool',compact('balance_braziliex'));
    }
}