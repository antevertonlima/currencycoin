<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as Controller;

use App\Http\Requests\GraphicSerieRequest as GraphicSerieRequest;

use App\Models\GraphicSerie;
use App\Models\GraphicType;

class GraphicSerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gseries = GraphicSerie::paginate(10);
        return view('partials.gserie.gserie', compact('gseries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gtypes = GraphicType::pluck('name', 'id');
        return view('partials.gserie.gserie-store', compact('gtypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GraphicSerieRequest $request, GraphicSerie $gserie)
    {
        $gserie->create($request->all());
        $url = $request->get('redirect_to' , route('gserie.index'));
        $request->session()->flash('message', 'Serie "'.$request->input('name').'" criada com sucesso!');
        return redirect()->to($url);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(GraphicSerie $gserie)
    {
        $gtypes = GraphicType::pluck('name', 'id');
        return view('partials.gserie.gserie-edit', compact('gserie','gtypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GraphicSerieRequest $request, GraphicSerie $gserie)
    {
        $gserie->fill($request->all());
        $gserie->save();
        $url = $request->get('redirect_to' , route('gserie.index'));
        $request->session()->flash('message', 'Serie "'.$gserie->name.'" salva com sucesso!');
        return redirect()->to($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, GraphicSerie $gserie)
    {
        $gserie->delete();
        $url = route('gserie.index');
        $request->session()->flash('message', 'Serie exclida com sucesso!');
        return redirect()->to($url);
    }
}
