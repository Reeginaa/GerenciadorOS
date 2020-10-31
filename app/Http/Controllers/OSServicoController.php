<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OSServico;
use App\Models\OrdemServico;
use App\Models\Servico;

class OSServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista = OSServico::with('servico')->with('ordemServico')->get();
        return view('osServicos.listOSServico', ['lista'=>$lista]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listaOrdemServico = OrdemServico::all();
        $listaServico = Servico::all();
        return view('osServicos.formOSServico', compact('listaOrdemServico', 'listaServico'));
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

        OSServico::create($request->all());
        return redirect('osServicos');
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
        $registro = OSServico::find($id);
        $listaOrdemServico = OrdemServico::all();
        $listaServico = Servico::all();
        return view('osServicos.editOSServico', compact('registro', 'listaOrdemServico', 'listaServico'));
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

        $osServico = OSServico::find($id);
        $osServico->update($request->all());

        return redirect('osServicos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $osServico = OSServico::find($id);
        $osServico->delete();

        return redirect('osServicos');
    }

    //Método com validações
    private function getValidate()
    {
        return [
            'valorServico' => 'required',
            'servico_id' => 'required',
            'ordemServico_id' => 'required'
        ];
    }
}
