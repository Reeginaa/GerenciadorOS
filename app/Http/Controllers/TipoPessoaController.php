<?php

namespace App\Http\Controllers;

use App\Models\TipoPessoas;
use Illuminate\Http\Request;

class TipoPessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista = TipoPessoas::all();
        return view('tipoPessoas.listTipoPessoa', ['lista'=>$lista]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipoPessoas.formTipoPessoa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate ($this->getValidate());

        TipoPessoas::create($request->all());
        return redirect('tipoPessoas')->with('success', 'Tipo Pessoa incluído!!!');
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
        $registro = TipoPessoas::find($id);
        return view('tipoPessoas.editTipoPessoa', ['registro'=>$registro]);
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

        $tipoPessoa = TipoPessoas::find($id);
        $tipoPessoa->update($request->all());
        return redirect('tipoPessoas')->with('success', 'Tipo Pessoa alterado!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //encontra o tipo de pessoa passando o id
        $tipoPessoa = TipoPessoas::find($id);
        //remove ele
        $tipoPessoa->delete();
        //redireciona o fluxo
        return redirect('tipoPessoas')->with('success', 'Tipo Pessoa excluído!!!!');
    }

    //Método das validações
    private function getValidate()
    {
        return ['tipo' => 'required|max:30'];
    }
}
