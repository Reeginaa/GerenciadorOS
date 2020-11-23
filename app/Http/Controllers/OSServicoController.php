<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OSServicos;
use App\Models\OrdemServicos;
use App\Models\Servicos;

class OSServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        OSServicos::create($request->all());
        return redirect('ordemServicos/' . $request->all()['ordemServico_id'] . '/edit');
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
        //
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
       //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $osServico = OSServicos::find($id);
        $osServico->delete();

        return redirect('ordemServicos');
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
