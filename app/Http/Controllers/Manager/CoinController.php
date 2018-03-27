<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//Models
use App\Models\Coin;
use App\Models\Algorithm;

class CoinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coins = Coin::paginate(10);
        return view('partials.coin.coins', compact('coins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $algorithms = Algorithm::pluck('name', 'id');
        return view('partials.coin.coins-store', compact('algorithms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Coin $coin)
    {
        $coin->create($request->all());
        $url = $request->get('redirect_to' , route('coin.index'));
        $request->session()->flash('message', 'Criptomoeda "'.$request->input('name').'" criada com sucesso!');
        return redirect()->to($url);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Coin $coin)
    {
        $algorithms = Algorithm::pluck('name', 'id');
        return view('partials.coin.coins-edit', compact('coin','algorithms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coin $coin)
    {
        $coin->fill($request->all());
        $coin->save();
        $url = $request->get('redirect_to' , route('coin.index'));
        $request->session()->flash('message', 'Criptomoeda "'.$coin->name.'" salva com sucesso!');
        return redirect()->to($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Coin $coin)
    {
        $coin->delete();
        // $url = $request->get('redirect_to' , route('coin.index'));
        $url = route('coin.index');
        $request->session()->flash('message', 'Criptomoeda exclida com sucesso!');
        return redirect()->to($url);
    }
}
