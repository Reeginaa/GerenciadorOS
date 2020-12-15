<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OSPecas;

class OSPecaController extends Controller
{
    /**
     * Store a newly created resource in storage
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->getValidate());

        $registro = $request->all();
        $registro['valor_total'] = $registro['qtd'] * $registro['valorPeca'];
        OSPecas::create($registro);
        return redirect('ordemServicos/' . $request->all()['ordemServico_id'] . '/edit')->with('Peça incluida com sucesso na OS!');
    }

    /**
     * Remove the specified resource from storage
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->all()['id'];
        $osPeca = OSPecas::find($id);
        $osPeca->delete();
        return ['status' => 'success'];
    }

    // Método de validação
    public function getValidate()
    {
        return [
            'qtd' => 'required',
            'valorPeca' => 'required',
            'peca_id' => 'required',
            'ordemServico_id' => 'required'
        ];
    }
}
