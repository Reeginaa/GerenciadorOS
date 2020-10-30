<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipamento;
use App\Models\Marca;

use function Ramsey\Uuid\v1;

class EquipamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista = Equipamento::with('marca')->get();
        return view('equipamentos.listEquipamento', ['lista'=>$lista]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //lista para o select
        $listaMarca = Marca::all();
        return view('equipamentos.formEquipamento', ['listaMarca'=>$listaMarca]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->getValidate());

        Equipamento::create($request->all());
        return redirect('equipamentos')->with('success', 'Equipamento inserido!!!');
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
        $registro = Equipamento::find($id);
        $listaMarca = Marca::all();
        return view('equipamentos.editEquipamento', compact('registro', 'listaMarca'));
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
        $request->validate($this->getValidate());

        $equipamento = Equipamento::find($id);
        $equipamento->update($request->all());

        return redirect('equipamentos')->with('success', 'Equipamento Alterado!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipamento = Equipamento::find($id);
        $equipamento->delete();

        return redirect('equipamentos')->with('success', 'Equipamento excluído!!!');
    }

    //Método das validações
    private function getValidate()
    {
        return ['nomeEquipamento' => 'required|max:45',
        'marca_id' => 'required'];
    }
}
