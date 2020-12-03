<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OSServicos;
use App\Models\OrdemServicos;
use App\Models\Servicos;

class OSServicoController extends Controller
{

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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $osServico = OSServicos::find($id);
        $osServico->delete();
        return ['status' => 'success'];
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
