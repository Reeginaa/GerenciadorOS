<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista = Pessoa::all();
        return view('pessoas.listPessoa', ['lista'=>$lista]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pessoas.formPessoa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:250',
            'cpf' => 'required|max:14',
            'rg' => 'required|max:10',
            'dataNascimento' => 'required',
            'sexo' => 'required|max:20',
            'logradouro' => 'required|max:300',
            'bairro' => 'required|max:100',
            'cidade' => 'required|max:50',
            'telefone' => 'required|max:25',
            'tipoPessoa_id' => 'required'
        ]);

        Pessoa::create($request->all());
        return redirect('pessoas');
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
        $pessoa = Pessoa::find($id);
        return view('pessoas.editPessoa', ['registro'=>$pessoa]);
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
            'nome' => 'required|max:250',
            'cpf' => 'required|max:14',
            'rg' => 'required|max:10',
            'dataNascimento' => 'required',
            'sexo' => 'required|max:20',
            'logradouro' => 'required|max:300',
            'bairro' => 'required|max:100',
            'cidade' => 'required|max:50',
            'telefone' => 'required|max:25',
            'tipoPessoa_id' => 'required'
        ]);

        $pessoa = Pessoa::find($id);
        $pessoa->update($request->all());
        return redirect('pessoas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pessoa = Pessoa::find($id);
        $pessoa->delete();

        return redirect('pessoas');
    }
}
