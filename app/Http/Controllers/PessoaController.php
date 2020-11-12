<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;
use App\Models\TipoPessoa;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista = Pessoa::with('tipoPessoa')->get();
        return view('pessoas.listPessoa', ['lista'=>$lista]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //lista para o select
        $listaTipoPessoa = TipoPessoa::all();
        return view('pessoas.formPessoa', ['listaTipoPessoa'=>$listaTipoPessoa]);
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

        Pessoa::create($request->all());
        return redirect('pessoas')->with('success', 'Pessoa inserida!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pessoa = Pessoa::find($id);
        return view('pessoas.viewPessoa', ['registro'=>$pessoa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registro = Pessoa::find($id);
        $listaTipoPessoa = TipoPessoa::all();
        return view('pessoas.editPessoa', compact('registro', 'listaTipoPessoa'));
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

        $pessoa = Pessoa::find($id);
        $pessoa->update($request->all());
        return redirect('pessoas')->with('success', 'Pessoa alterada!!!');
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

        return redirect('pessoas')->with('success', 'Pessoa excluída!!!');
    }

    //Método com as validações
    private function getValidate()
    {
        return ['nome' => 'required|max:250',
        'cpf' => 'required|max:14|unique:pessoas,cpf',
        'rg' => 'required|max:10|unique:pessoas,rg',
        'dataNascimento' => 'required',
        'sexo' => 'required|max:20',
        'logradouro' => 'required|max:300',
        'bairro' => 'required|max:100',
        'cidade' => 'required|max:50',
        'telefone' => 'required|max:25',
        'tipoPessoa_id' => 'required'];
    }
}
