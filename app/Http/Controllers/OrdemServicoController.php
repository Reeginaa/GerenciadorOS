<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrdemServico;
use App\Models\Pessoa;
use App\Models\Equipamento;
use App\Models\StatusServico;

class OrdemServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista = OrdemServico::with('pessoa')->with('equipamento')->with('statusServico')->get();
        return view('ordemServicos.listOS', ['lista'=>$lista]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listaPessoa = Pessoa::all();
        $listaStatusServico = StatusServico::all();
        $listaEquipamento = Equipamento::all();
        return view('ordemServicos.formOS', compact('listaPessoa', 'listaStatusServico', 'listaEquipamento'));
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

        OrdemServico::create($request->all());
        return redirect('ordemServicos')->with('success', 'O.S. inserida!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ordemServico = OrdemServico::find($id);
        return view('ordemServicos.viewOS', ['registro'=>$ordemServico]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registro = OrdemServico::find($id);
        $listaEquipamento = Equipamento::all();
        $listaPessoa = Pessoa::all();
        $listaStatusServico = StatusServico::all();
        return view('ordemServicos.editOS', compact('registro', 'listaEquipamento', 'listaPessoa', 'listaStatusServico'));
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

        $ordemServico = OrdemServico::find($id);
        $ordemServico->update($request->all());

        return redirect('ordemServicos')->with('success', 'O.S. alterada!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ordemServico = OrdemServico::find($id);
        $ordemServico->delete();

        return redirect('ordemServicos')->with('success', 'O.S. excluída!!!');
    }

    //Método com as validações
    private function getValidate()
    {
        return ['dataInicio' => 'required',
        'defeito' => 'required',
        'statusServico_id' => 'required',
        'pessoa_id' => 'required',
        'equipamento_id' => 'required'];
    }

    //Método para botão fechar
    public function fechar($id)
    {
        $os = array('statusServico_id'=>StatusServico::getStatusFechado(), 'dataTermino'=>date('Y-m-d'));
        OrdemServico::find($id)->update($os);

        return redirect('ordemServicos')->with('success', 'O.S. Fechada!!!');
    }

    //Método para botão reabrir
    public function reabrir($id)
    {
        $os = array('statusServico_id'=>StatusServico::getStatusInicio(), 'dataTermino'=>null);
        OrdemServico::find($id)->update($os);

        return redirect('ordemServicos')->with('success', 'O.S. Reaberta!!!');
    }

    //Método para botão faturar
    public function faturar($id)
    {
        $os = array('statusServico_id'=>StatusServico::getStatusConcluido(), 'dataTermino'=>date('Y-m-d'));
        OrdemServico::find($id)->update($os);

        return redirect('ordemServicos')->with('success', 'O.S. Faturada!!!');
    }
}
