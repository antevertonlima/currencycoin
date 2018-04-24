<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as Controller;
use App\Http\Requests\RigsRequest as RigsRequest;

use App\Models\MiningGroup;
use App\Models\Coin;
use App\Models\Rig;

class RigsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grigs = Rig::paginate(10);
        $miningPowerOC = 0;
        $miningPowerST = 0;
        return view('partials.grig.grig', compact('grigs','miningPowerOC','miningPowerST'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mgroup = MiningGroup::pluck('name', 'id');
        $coin = Coin::pluck('name', 'id');
        return view('partials.grig.grig-store', compact('mgroup','coin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RigsRequest $request, Rig $grig)
    {
        $grig->create($request->all());
        $url = $request->get('redirect_to' , route('grig.index'));
        $request->session()->flash('message', 'Rig de mineração "'.$request->input('name').'" criada com sucesso!');
        return redirect()->to($url);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Rig $grig)
    {
        $mgroup = MiningGroup::pluck('name', 'id');
        $coin = Coin::pluck('name', 'id');
        return view('partials.grig.grig-edit', compact('grig','mgroup','coin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RigsRequest $request, Rig $grig)
    {
        $grig->fill($request->all());
        $grig->save();
        $url = $request->get('redirect_to' , route('grig.index'));
        $request->session()->flash('message', 'Rig de mineração "'.$grig->name.'" salva com sucesso!');
        return redirect()->to($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Rig $grig)
    {
        $grig->delete();
        $url = route('grig.index');
        $request->session()->flash('message', 'Rig de mineração excluida com sucesso!');
        return redirect()->to($url);
    }
}
