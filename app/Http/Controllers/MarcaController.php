<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marcas;

class MarcaController extends Controller
{
    private $marcas;

    public function __construct()
    {
        $this->marcas = new Marcas();
    }
    /**
     * Display a listing of the resource.
     * Mostra uma lista do recurso
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista = Marcas::all();
        return view('marcas.listMarca', ['lista'=>$lista]);
    }

    /**
     * Show the form for creating a new resource.
     * Mostra o formulário de criação de um novo recurso
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marcas.formMarca');
    }

    /**
     * Store a newly created resource in storage.
     * Armazena um recurso recém criado no armazenamento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate ( [
            'nomeMarca' => 'required|max:40|unique:marcas,nomeMarca',
        ]);

        $marcas = $this->marcas;
        $marcas->nomeMarca = $request->input('nomeMarca');
        $marcas->observacaoMarca = $request->input('observacaoMarca');

        $marcas->save();
        //$marcas = Marcas::create($request->all());

        if($request->input('ajax')) {
            return json_encode($marcas);
        }

        return redirect('marcas')->with('success', 'Marca incluida!!!');
    }

    /**
     * Display the specified resource.
     * Exibe o recurso especificado.
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
     * Mostra o formulário para editar o recurso especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registro = Marcas::find($id);
        return view('marcas.editMarca', ['registro'=>$registro]);
    }

    /**
     * Update the specified resource in storage.
     * Atualiza o recurso especificado no armazenamento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nomeMarca' => 'required|max:40|unique:marcas,nomeMarca,'.$id,
        ]);

        $marca = Marcas::find($id);
        $marca->update($request->all());

        return redirect('marcas')->with('success', 'Marca alterada!!!');
    }

    /**
     * Remove the specified resource from storage.
     * Remove o recurso especificado do armazenamento.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $marca = Marcas::find($id);
            $marca->delete();
            return ['status' => 'success'];
        } catch (\Illuminate\Database\QueryException $qe) {
            return ['status' => 'errorQuery', 'message' => $qe->getMessage()];
        } catch (\PDOException $e){
            return ['status' => 'errorPDO', 'message' => $e->getMessage()];
        }
    }
}
