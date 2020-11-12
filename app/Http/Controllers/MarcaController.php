<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marcas;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     * Mostra uma lista do recurso
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista = Marcas::all();
        return view('marcas.listMarca', ['lista'=>$lista]);
    }

    /**
     * Show the form for creating a new resource.
     * Mostra o formulário de criação de um novo recurso
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marcas.formMarca');
    }

    /**
     * Store a newly created resource in storage.
     * Armazena um recurso recém criado no armazenamento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate ($this->getValidate());

        Marcas::create($request->all());
        return redirect('marcas')->with('success', 'Marca incluida!!!');
    }

    /**
     * Display the specified resource.
     * Exibe o recurso especificado.
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
     * Mostra o formulário para editar o recurso especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registro = Marcas::find($id);
        return view('marcas.editMarca', ['registro'=>$registro]);
    }

    /**
     * Update the specified resource in storage.
     * Atualiza o recurso especificado no armazenamento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate($this->getValidate());

        $marca = Marcas::find($id);
        $marca->update($request->all());

        return redirect('marcas')->with('success', 'Marca alterada!!!');
    }

    /**
     * Remove the specified resource from storage.
     * Remove o recurso especificado do armazenamento.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marca = Marcas::find($id);
        $marca->delete();

        return redirect('marcas')->with('success', 'Marca excluída!!!');
    }

    //Método das validações
    private function getValidate()
    {
        return ['nomeMarca' => 'required|max:40'];
    }
}
