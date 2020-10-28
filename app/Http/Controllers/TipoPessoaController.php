<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoPessoa;

class TipoPessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoPessoas = TipoPessoa::all();

        return view('tipoPessoas.listTipoPessoa', compact('tipoPessoas'));
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
        $request->validate ([
            'tipo' => 'required'
        ]);

        $tipoPessoa = new TipoPessoa([
            'tipo' => $request->get('tipo'),
            'descricao'=> $request->get('descricao')
        ]);

        $tipoPessoa->save();
        return redirect('/tipoPessoas')->with('success', 'Tipo Pessoa Inserido!!!');
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
        $tipoPessoa = TipoPessoa::find($id);
        return view('tipoPessoas.editTipoPessoa', compact('tipoPessoa'));
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
        $request->validate([
            'tipo' => 'required'
        ]);

        $tipoPessoa->TipoPessoa::find($id);
        $tipoPessoa->tipo = $request->get('tipo');
        $tipoPessoa->descricao = $request->get('descricao');
        $tipoPessoa->save();

        return redirect('/tipoPessoas')->with('success', 'Tipo Pessoa Alterado!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipoPessoa = TipoPessoa::find($id);
        $tipoPessoa->delete();

        return redirect('/tipoPessoas')->with('success', 'Tipo Pessoa Excluído!!');
    }
}
