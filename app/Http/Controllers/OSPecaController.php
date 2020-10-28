<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OSPeca;

class OSPecaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista = OSPeca::all();
        return view('osPecas.listOSPeca', ['lista'=>$lista]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('osPecas.formOSPeca');
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
            'valorPeca' => 'required'
        ]);

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
        $osPeca = OSPeca::find($id);
        return view('osPecas.editOSPeca', ['registro'=>$osPeca]);
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
            'valorPeca' => 'required'
        ]);

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
}
