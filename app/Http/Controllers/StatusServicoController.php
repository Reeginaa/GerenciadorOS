<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StatusServico;

class StatusServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista = StatusServico::all();
        return view('statusServicos.listStatusServico', ['lista'=>$lista]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('statusServicos.formStatusServico');
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

        StatusServico::create($request->all());
        return redirect('statusServicos')->with('success', 'Status inserido!!!');
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
        $registro = StatusServico::find($id);
        return view('statusServicos.editStatusServico', ['registro'=>$registro]);
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

        $statusServico = StatusServico::find($id);
        $statusServico->update($request->all());

        return redirect('statusServicos')->with('success', 'Status alterado!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $statusServico = StatusServico::find($id);
        $statusServico->delete();

        return redirect('statusServicos')->with('success', 'Status excluído!!!');
    }

    //Método das validações
    private function getValidate()
    {
        return ['status' => 'required|max:50'];
    }
}