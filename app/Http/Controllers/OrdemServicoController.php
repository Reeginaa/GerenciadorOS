<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrdemServico;

class OrdemServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordemServicos = OrdemServico::all();
        return view('ordemServicos.listOS', compact('ordemServicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ordemServicos.formOS');
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
            'pessoa_id' => 'required',
            'equipamento_id' => 'required',
            'statusServico_id' => 'required',
            'dataInicio' => 'required',
            'defeito' => 'required'

        ]);

        $ordemServico = new OrdemServico([
            'pessoa_id' => $request->get('pessoa_id'),
            'equipamento_id' => $request->get('equipamento_id'),
            'statusServico_id' => $request->get('statusServico_id'),
            'dataInicio' => $request->get('dataInicio'),
            'dataTermino' => $request->get('dataTermino'),
            'defeito' => $request->get('defeito'),
            'observacoesOS' => $request->get('observacoesOS'),
            'valorTotal' => $request->get('valorTotal'),
            'termos' => $request->get('termos'),
            'assinatura'=> $request->get('assinatura')
        ]);

        $ordemServico->save();
        return redirect('/ordemServicos')->with('sucess', 'O.S. inserida com sucesso!!!');
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
        $ordemServico = OrdemServico::find($id);
        return view('ordemServicos.editOS', compact('ordemServico'));
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
            'pessoa_id' => 'required',
            'equipamento_id' => 'required',
            'statusServico_id' => 'required',
            'dataInicio' => 'required',
            'defeito' => 'required'

        ]);

        $ordemServico->OrdemServico::find($id);
        $ordemServico->pessoa_id = $request->get('pessoa_id');
        $ordemServico->equipamento_id = $request->get('equipamento_id');
        $ordemServico->statusServico_id = $request->get('statusServico_id');
        $ordemServico->dataInicio = $request->get('dataInicio');
        $ordemServico->dataTermino = $request->get('dataTermino');
        $ordemServico->defeito = $request->get('defeito');
        $ordemServico->observacoesOS = $request->get('observacoesOS');
        $ordemServico->valorTotal = $request->get('valorTotal');
        $ordemServico->termos = $request->get('termos');
        $ordemServico->assinatura= $request->get('assinatura');
        $ordemServico->save();

        return redirect('/ordemServicos')->with('success', 'O.S. alterada com sucesso!!!');
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

        return redirect('/ordemServicos')->with('success', 'O.S. excluída');
    }
}
