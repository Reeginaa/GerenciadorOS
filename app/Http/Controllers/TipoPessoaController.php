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
        $lista = TipoPessoa::all();
        //dd($lista);
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
        $request->validate ([
            'tipo' => 'required|max:30'
        ]);

        TipoPessoa::create($request->all());
        return redirect('tipoPessoa');
        // dd($request);
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
        //dd($tipoPessoa);
        return view('tipoPessoas.editTipoPessoa', ['registro'=>$tipoPessoa]);
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
            'tipo' => 'required|max:30'
        ]);

        $tipoPessoa = TipoPessoa::find($id);
        $tipoPessoa->update($request->all());
        return redirect('tipoPessoas');
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
        $tipoPessoa = TipoPessoa::find($id);
        //remove ele
        $tipoPessoa->delete();
        //redireciona o fluxo
        return redirect('tipoPessoas');
    }
}
