<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paises = DB::table('tb_pais')->orderBy('pais_nomb')->get();
        return view('pais.index', ['paises' => $paises]);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pais.new');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pais_codi' => 'required|string|size:3|unique:tb_pais,pais_codi',
            'pais_nomb' => 'required|string',
            'pais_capi' => 'required|integer'
        ]);

        $pais = new Pais();
        $pais->pais_codi = strtoupper($request->pais_codi); // Asegura que esté en mayúsculas
        $pais->pais_nomb = $request->pais_nomb;
        $pais->pais_capi = $request->pais_capi;
        $pais->save();

        return redirect()->route('pais.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $pais = Pais::find($id);
        return view('pais.edit', ['pais' => $pais]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pais = Pais::find($id);
        $pais->pais_nomb = $request->pais_nomb;
        $pais->pais_capi = $request->pais_capi;
        $pais->save();

        return redirect()->route('pais.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pais = Pais::find($id);
        $pais->delete();

        return redirect()->route('pais.index');
    }
}