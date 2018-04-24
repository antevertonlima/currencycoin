<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as Controller;
use App\Http\Requests\GraphicBoardRigRequest as GraphicBoardRigRequest;

use App\Models\Rig;
use App\Models\GraphicsCard;
use App\Models\GraphicBoardsRig;

class GraphicBoardRigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gboards = GraphicBoardsRig::paginate(10);
        $gcard   = GraphicsCard::find(2);
        
        //dd($gcard->hashrash);
        //dd($gboards->rig->name);
        return view('partials.gboard.gboard', compact('gboards','gcard'));
        //return $gboards;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gcard = GraphicsCard::pluck('name', 'id');
        $grig  = Rig::pluck('name', 'id');
        return view('partials.gboard.gboard-store', compact('gcard','grig'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GraphicBoardRigRequest $request, GraphicBoardsRig $gboard)
    {
        $gboard->create($request->all());
        $url = $request->get('redirect_to' , route('gboard.index'));
        $request->session()->flash('message', 'Placa de mineração "'.$gboard->id.'" criada com sucesso!');
        return redirect()->to($url);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(GraphicBoardsRig $gboard)
    {
        $gcard = GraphicsCard::pluck('name', 'id');
        $grig  = Rig::pluck('name', 'id');
        return view('partials.gboard.gboard-edit', compact('gboard','gcard','grig'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GraphicBoardRigRequest $request, GraphicBoardsRig $gboard)
    {
        $gboard->fill($request->all());
        $gboard->save();
        $url = $request->get('redirect_to' , route('gboard.index'));
        $request->session()->flash('message', 'Placa de mineração "'.$gboard->id.'" salva com sucesso!');
        return redirect()->to($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, GraphicBoardsRig $gboard)
    {
        $gboard->delete();
        $url = route('gboard.index');
        $request->session()->flash('message', 'Placa de mineração excluida com sucesso!');
        return redirect()->to($url);
    }
}
