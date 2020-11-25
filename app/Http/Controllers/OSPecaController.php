<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OSPecas;

class OSPecaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate($this->getValidate());

        OSPecas::create($request->all());
        return redirect('ordemServicos/' . $request->all()['ordemServico_id'] . '/edit');
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
            $osPeca = OSPecas::find($id);
            $osPeca->delete();
            return ['status' => 'success'];
        } catch (\Illuminate\Database\QueryException $qe) {
            return ['status' => 'errorQuery', 'message' => $qe->getMessage()];
        } catch (\PDOException $e) {
            return ['status' => 'errorPDO', 'message' => $e->getMessage()];
        }
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
