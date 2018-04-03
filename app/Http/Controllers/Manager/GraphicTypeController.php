<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as Controller;
use App\Http\Requests\GraphicTypeRequest as GraphicTypeRequest;

use App\Models\GraphicType;
use App\Models\Brand;

class GraphicTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gtypes = GraphicType::paginate(10);
        return view('partials.gtype.gtype', compact('gtypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = Brand::pluck('name', 'id');
        return view('partials.gtype.gtype-store', compact('brand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GraphicTypeRequest $request, GraphicType $gtype)
    {
        $gtype->create($request->all());
        $url = $request->get('redirect_to' , route('gtype.index'));
        $request->session()->flash('message', 'Tipo "'.$request->input('name').'" criada com sucesso!');
        return redirect()->to($url);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(GraphicType $gtype)
    {
        $brand = Brand::pluck('name', 'id');
        return view('partials.gtype.gtype-edit', compact('gtype','brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GraphicTypeRequest $request, GraphicType $gtype)
    {
        $gtype->fill($request->all());
        $gtype->save();
        $url = $request->get('redirect_to' , route('gtype.index'));
        $request->session()->flash('message', 'Tipo "'.$gtype->name.'" salva com sucesso!');
        return redirect()->to($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, GraphicType $gtype)
    {
        $gtype->delete();
        $url = route('gtype.index');
        $request->session()->flash('message', 'Tipo exclida com sucesso!');
        return redirect()->to($url);
    }
}
