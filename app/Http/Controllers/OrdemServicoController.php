<?php

namespace App\Http\Controllers;

use App\Models\Equipamentos;
use App\Models\OrdemServicos;
use App\Models\Pessoas;
use App\Models\StatusServicos;
use Illuminate\Http\Request;

class OrdemServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista = OrdemServicos::with('pessoa')->with('equipamento')->with('statusServico')->get();
        return view('ordemServicos.listOS', ['lista'=>$lista]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listaPessoa = Pessoas::all();
        $listaStatusServico = StatusServicos::all();
        $listaEquipamento = Equipamentos::all();
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

        OrdemServicos::create($request->all());
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
        $ordemServico = OrdemServicos::find($id);
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
        $registro = OrdemServicos::find($id);
        $listaEquipamento = Equipamentos::all();
        $listaPessoa = Pessoas::all();
        $listaStatusServico = StatusServicos::all();
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

        $ordemServico = OrdemServicos::find($id);
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
        $ordemServico = OrdemServicos::find($id);
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
        $os = array('statusServico_id'=>StatusServicos::getStatusFechado(), 'dataTermino'=>date('Y-m-d'));
        OrdemServicos::find($id)->update($os);

        return redirect('ordemServicos')->with('success', 'O.S. Fechada!!!');
    }

    //Método para botão reabrir
    public function reabrir($id)
    {
        $os = array('statusServico_id'=>StatusServicos::getStatusInicio(), 'dataTermino'=>null);
        OrdemServicos::find($id)->update($os);

        return redirect('ordemServicos')->with('success', 'O.S. Reaberta!!!');
    }

    //Método para botão faturar
    public function faturar($id)
    {
        $os = array('statusServico_id'=>StatusServicos::getStatusConcluido(), 'dataTermino'=>date('Y-m-d'));
        OrdemServicos::find($id)->update($os);

        return redirect('ordemServicos')->with('success', 'O.S. Faturada!!!');
    }
}
