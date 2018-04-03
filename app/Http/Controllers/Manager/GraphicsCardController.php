<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as Controller;
use App\Http\Requests\GraphicsCardRequest as GraphicsCardRequest;

use App\Models\GraphicsCard;
use App\Models\GraphicSerie;

class GraphicsCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gcards = GraphicsCard::paginate(10);
        return view('partials.gcard.gcard', compact('gcards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gseries = GraphicSerie::pluck('name', 'id');
        return view('partials.gcard.gcard-store', compact('gseries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GraphicsCardRequest $request, GraphicsCard $gcard)
    {
        $gcard->create($request->all());
        $url = $request->get('redirect_to' , route('gcard.index'));
        $request->session()->flash('message', 'Placa "'.$request->input('name').'" criada com sucesso!');
        return redirect()->to($url);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(GraphicsCard $gcard)
    {
        $gseries = GraphicSerie::pluck('name', 'id');
        return view('partials.gcard.gcard-edit', compact('gcard','gseries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GraphicsCardRequest $request, GraphicsCard $gcard)
    {
        $gcard->fill($request->all());
        $gcard->save();
        $url = $request->get('redirect_to' , route('gcard.index'));
        $request->session()->flash('message', 'Placa "'.$gcard->name.'" salva com sucesso!');
        return redirect()->to($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, GraphicsCard $gcard)
    {
        $gcard->delete();
        $url = route('gcard.index');
        $request->session()->flash('message', 'Placa exclida com sucesso!');
        return redirect()->to($url);
    }
}
