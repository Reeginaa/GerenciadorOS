<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OSServico;

class OSServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista = OSServico::all();
        return view('osServicos.listOSServico', ['lista'=>$lista]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('osServicos.formOSServico');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'valorServico' => 'required'
        ]);

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
        $osServico = OSServico::find($id);
        return view('osServicos.editOSServico', ['registro'=>$osServico]);
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
        $request->validate([
            'valorServico' => 'required'
        ]);

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
}
