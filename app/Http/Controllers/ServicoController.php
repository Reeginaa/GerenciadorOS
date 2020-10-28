<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servico;

class ServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicos = Servico::all();

        return view('servicos.listServico', compact('servicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('servicos.formServico');
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
            'servico' => 'required',
            'valor' => 'required'
        ]);

        $servico = new Servico ([
            'servico' => $request->get('servico'),
            'valor' => $request->get('valor'),
            'desconto' => $request->get('desconto')
        ]);

        $servico->save();
        return redirect('/servicos')->with('success', 'Serviço inserido!!!');
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
        $servico = Servico::find($id);
        return view('servicos.editServico', compact('servico'));
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
            'servico' => 'required',
            'valor' => 'required'
        ]);

        $servico->Servico::find($id);
        $servico->servico = $request->get('servico');
        $servico->valor = $request->get('valor');
        $servico->desconto = $request->get('desconto');
        $servico->save();

        return redirect('/servicos')->with('success', 'Serviço alterado com sucesso!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servico = Servico::find($id);
        $servico->delete();

        return redirect('/servicos')->with('success', 'Serviço excluído com sucesso!!!');
    }
}
