<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OSPeca;
use App\Models\Peca;
use App\Models\OrdemServico;

class OSPecaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista = OSPeca::with('peca')->with('ordemServico')->get();
        return view('osPecas.listOSPeca', ['lista'=>$lista]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listaOrdemServico = OrdemServico::all();
        $listaPeca = Peca::all();
        return view('osPecas.formOSPeca', compact('listaOrdemServico', 'listaPeca'));
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

        OSPeca::create($request->all());
        return redirect('osPecas');
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
        $registro = OSPeca::find($id);
        $listaOrdemServico = OrdemServico::all();
        $listaPeca = Peca::all();
        return view('osPecas.editOSPeca', compact('registro', 'listaOrdemServico', 'listaPeca'));
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

        $osPeca = OSPeca::find($id);
        $osPeca->update($request->all());

        return redirect('osPecas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $osPeca = OSPeca::find($id);
        $osPeca->delete();

        return redirect('osPecas');
    }

    //Método com validações
    private function getValidate()
    {
        return [
            'quantidade' => 'required',
            'valorPeca' => 'required',
            'peca_id' => 'required',
            'ordemServico_id' => 'required'
        ];
    }
}
