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
        return view('nanopool');
    }
}