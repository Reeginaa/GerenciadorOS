<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pecas;

class PecaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista = Pecas::all();
        return view('pecas.listPeca', ['lista'=>$lista]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pecas.formPeca');
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

        $registro = $request->all();
        $registro['valorCompra'] = str_replace('.', '', $registro['valorCompra']);
        $registro['valorCompra'] = str_replace(',', '.', $registro['valorCompra']);
        $registro['valorCompra'] = str_replace('R$', '', $registro['valorCompra']);
        $registro['valorVenda'] = str_replace('.', '', $registro['valorVenda']);
        $registro['valorVenda'] = str_replace(',', '.', $registro['valorVenda']);
        $registro['valorVenda'] = str_replace('R$', '', $registro['valorVenda']);
        Pecas::create($registro);
        return redirect('pecas')->with('success', 'Peça inserida!!!');
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
        $registro = Pecas::find($id);
        return view('pecas.editPeca', ['registro'=>$registro]);
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

        $registro = $request->all();
        $registro['valorCompra'] = str_replace('.', '', $registro['valorCompra']);
        $registro['valorCompra'] = str_replace(',', '.', $registro['valorCompra']);
        $registro['valorCompra'] = str_replace('R$', '', $registro['valorCompra']);
        $registro['valorVenda'] = str_replace('.', '', $registro['valorVenda']);
        $registro['valorVenda'] = str_replace(',', '.', $registro['valorVenda']);
        $registro['valorVenda'] = str_replace('R$', '', $registro['valorVenda']);
        $peca = Pecas::find($id);
        $peca->update($registro);

        return redirect('pecas')->with('success', 'Peça alterada!!!');
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
            $peca = Pecas::find($id);
            $peca->delete();
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
            'item' => 'required|max:100',
            'quantidade' => 'required',
            'valorCompra' => 'required',
            'valorVenda' => 'required'
        ];
    }

    public function postPeca(Request $request)
    {
        $peca = Pecas::find($request->all()['id']);
        return array('pecaValor'=>$peca->valorVenda);

    }
}
