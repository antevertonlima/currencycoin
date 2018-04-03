<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as Controller;
use App\Http\Requests\GraphicsHashRequest as GraphicsHashRequest;

use App\Models\HashrateGraphic;
use App\Models\GraphicsCard;
use App\Models\Coin;

class GraphicsHashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ghashs = HashrateGraphic::paginate(10);
        return view('partials.ghash.ghash', compact('ghashs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gcards = GraphicsCard::pluck('description', 'id');
        $coins  = Coin::pluck('name', 'id');
        return view('partials.ghash.ghash-store', compact('gcards','coins'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GraphicsHashRequest $request, HashrateGraphic $ghash)
    {
        $ghash->create($request->all());
        $url = $request->get('redirect_to' , route('ghash.index'));
        $request->session()->flash('message', 'Hashrate "'.$request->input('name').'" criada com sucesso!');
        return redirect()->to($url);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(HashrateGraphic $ghash)
    {
        $gcards = GraphicsCard::pluck('description', 'id');
        $coins  = Coin::pluck('name', 'id');
        return view('partials.ghash.ghash-edit', compact('ghash','gcards','coins'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GraphicsHashRequest $request, HashrateGraphic $ghash)
    {
        $ghash->fill($request->all());
        $ghash->save();
        $url = $request->get('redirect_to' , route('ghash.index'));
        $request->session()->flash('message', 'Hashrate "'.$ghash->name.'" salva com sucesso!');
        return redirect()->to($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, HashrateGraphic $ghash)
    {
        $ghash->delete();
        $url = route('ghash.index');
        $request->session()->flash('message', 'Hashrate exclida com sucesso!');
        return redirect()->to($url);
    }
}
