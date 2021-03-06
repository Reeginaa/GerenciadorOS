<?php

namespace App\Http\Controllers;

use App\Models\Pessoas;
use App\Models\TipoPessoas;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista = Pessoas::with('tipoPessoa')->get();
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
        $listaTipoPessoa = TipoPessoas::all();
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
        $request->validate([
            'nome' => 'required|max:250',
            'cpf' => 'required|max:14|unique:pessoas,cpf',
            'rg' => 'required|max:10|unique:pessoas,rg',
            'dataNascimento' => 'required',
            'sexo' => 'required|max:20',
            'logradouro' => 'required|max:300',
            'bairro' => 'required|max:100',
            'cidade' => 'required|max:50',
            'telefone' => 'required|max:25',
            'tipoPessoa_id' => 'required'
        ]);

        $pessoas = Pessoas::create($request->all());

        if ($request->input('ajax')) {
             return json_encode($pessoas);
        }

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
        $pessoa = Pessoas::find($id);
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
        $registro = Pessoas::find($id);
        $listaTipoPessoa = TipoPessoas::all();
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
        $request->validate([
            'nome' => 'required|max:250',
            'cpf' => 'required|max:14|unique:pessoas,cpf,'.$id,
            'rg' => 'required|max:10|unique:pessoas,rg,'.$id,
            'dataNascimento' => 'required',
            'sexo' => 'required|max:20',
            'logradouro' => 'required|max:300',
            'bairro' => 'required|max:100',
            'cidade' => 'required|max:50',
            'telefone' => 'required|max:25',
            'tipoPessoa_id' => 'required'
        ]);

        $pessoa = Pessoas::find($id);
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
        try {
            $pessoa = Pessoas::find($id);
            $pessoa->delete();
            return ['status' => 'success'];
        } catch (\Illuminate\Database\QueryException $qe) {
            return ['status' => 'errorQuery', 'message' => $qe->getMessage()];
        } catch (\PDOException $e) {
            return ['status' => 'errorPDO', 'message' => $e->getMessage()];
        }
    }

}
