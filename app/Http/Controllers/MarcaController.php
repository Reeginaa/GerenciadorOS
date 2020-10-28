<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = Marca::all();

        return view('marcas.listMarca', compact('marcas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marcas.formMarca');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate ([
            'nomeMarca' => 'required'
        ]);

        $marca = new Marca ([
            'nomeMarca' => $request->get('nomeMarca'),
            'observacaoMarca' => $request->get('observacaoMarca')
        ]);

        $marca->save();
        return redirect('/marcas')->with('success', 'Marca Inserida!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marca = Marca::find($id);
        return view('marcas.editMarca', compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validade([
            'nomeMarca' => 'required'
        ]);

        $marca->Marca::find($id);
        $marca->nomeMarca = $request->get('nomeMarca');
        $marca->observacaoMarca = $request->get('observacaoMarca');
        $marca->save();

        return redirect('/marcas')->with('success', 'Marca Alterada!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marca = Marca::find($id);
        $marca->delete();

        return redirect('/marcas')->with('success', 'Marca Excluida!!!');
    }
}
