<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\AlgorithmRequest as Request;

//Models
use App\Models\Algorithm;

class AlgorithmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $algorithms = Algorithm::paginate(10);
        return view('partials.algo.algorithms', compact('algorithms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partials.algo.algorithms-store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Algorithm $algo)
    {
        $algo->create($request->all());
        $url = $request->get('redirect_to' , route('algo.index'));
        $request->session()->flash('message', 'Algoritmo "'.$request->input('name').'" criado com sucesso!');
        return redirect()->to($url);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Algorithm $algo)
    {
        return view('partials.algo.algorithms-edit', compact('algo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Algorithm $algo)
    {
        $algo->fill($request->all());
        $algo->save();
        $url = $request->get('redirect_to' , route('algo.index'));
        $request->session()->flash('message', 'Criptomoeda "'.$algo->name.'" salva com sucesso!');
        return redirect()->to($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Algorithm $algo)
    {
        $algo->delete();
        // $url = $request->get('redirect_to' , route('coin.index'));
        $url = route('algo.index');
        $request->session()->flash('message', 'Algoritimo exclido com sucesso!');
        return redirect()->to($url);
    }
}
