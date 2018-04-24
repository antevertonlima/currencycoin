<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as Controller;
use App\Http\Requests\MiningGroupsRequest as MiningGroupsRequest;

use App\Models\MiningGroup;

class MiningGroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mgroups = MiningGroup::paginate(10);
        return view('partials.mgroup.mgroup', compact('mgroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partials.mgroup.mgroup-store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MiningGroupsRequest $request, MiningGroup $mgroup)
    {
        $mgroup->create($request->all());
        $url = $request->get('redirect_to' , route('mgroup.index'));
        $request->session()->flash('message', 'Grupo de mineração "'.$request->input('name').'" criada com sucesso!');
        return redirect()->to($url);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(MiningGroup $mgroup)
    {
        return view('partials.mgroup.mgroup-edit', compact('mgroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MiningGroupsRequest $request, MiningGroup $mgroup)
    {
        $mgroup->fill($request->all());
        $mgroup->save();
        $url = $request->get('redirect_to' , route('mgroup.index'));
        $request->session()->flash('message', 'Grupo de mineração "'.$mgroup->name.'" salva com sucesso!');
        return redirect()->to($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, MiningGroup $mgroup)
    {
        $mgroup->delete();
        $url = route('mgroup.index');
        $request->session()->flash('message', 'Grupo de mineração excluido com sucesso!');
        return redirect()->to($url);
    }
}
