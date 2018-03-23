<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Algorithm;

class AlgorithmController extends BaseController
{
    public function index() {
        $algorithms = Algorithm::paginate(15);
        return view('partials.algorithms', compact('algorithms'));
    }
}
