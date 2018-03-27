<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as Controller;
use App\Http\Requests\BrandRequest as BrandRequest;

use App\Models\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = brand::paginate(10);
        return view('partials.brand.brands', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partials.brand.brands-store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request, Brand $brand)
    {
        $brand->create($request->all());
        $url = $request->get('redirect_to' , route('brand.index'));
        $request->session()->flash('message', 'Marca "'.$request->input('name').'" criada com sucesso!');
        return redirect()->to($url);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('partials.brand.brands-edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, Brand $brand)
    {
        $brand->fill($request->all());
        $brand->save();
        $url = $request->get('redirect_to' , route('brand.index'));
        $request->session()->flash('message', 'Marca "'.$request->input('name').'" salva com sucesso!');
        return redirect()->to($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Brand $brand)
    {
        $brand->delete();
        $url = $request->get('redirect_to' , route('brand.index'));
        $request->session()->flash('message', 'Marca exclida com sucesso!');
        return redirect()->to($url);
    }
}
