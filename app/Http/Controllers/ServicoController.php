<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicos;

class ServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista = Servicos::all();
        return view('servicos.listServico', ['lista'=>$lista]);
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
        $request->validate ($this->getValidate());

        $registro = $request->all();
        $registro['valor'] = str_replace('.', '', $registro['valor']);
        $registro['valor'] = str_replace(',', '.', $registro['valor']);
        $registro['valor'] = str_replace('R$', '', $registro['valor']);
        Servicos::create($registro);
        return redirect('servicos')->with('success', 'Serviço inserido!!!');
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
        $registro = Servicos::find($id);
        return view('servicos.editServico', ['registro'=>$registro]);
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

        $servico = Servicos::find($id);
        $servico->update($request->all());

        return redirect('servicos')->with('success', 'Serviço alterado!!!');
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
            $servico = Servicos::find($id);
            $servico->delete();
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
            'servico' => 'required|max:200|unique:servicos,servico',
            'valor' => 'required'
        ];
    }

    public function postServico(Request $request)
    {
        $servico = Servicos::find($request->all()['id']);
        return array('servicoValor'=>$servico->valor);

    }
}
