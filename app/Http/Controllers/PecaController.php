<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peca;

class PecaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista = Peca::all();
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
        $request->validate([
            'item' => 'required|max:100',
            'quantidade' => 'required',
            'valorCompra' => 'required',
            'valorVenda' => 'required'
        ]);

        Peca::create($request->all());
        return redirect('pecas');
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
        $peca = Peca::find($id);
        return view('pecas.editPeca', ['registro'=>$peca]);
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
            'item' => 'required|max:100',
            'quantidade' => 'required',
            'valorCompra' => 'required',
            'valorVenda' => 'required'
        ]);

        $peca = Peca::find($id);
        $peca->update($request->all());

        return redirect('pecas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peca = Peca::find($id);
        $peca->delete();

        return redirect('pecas');
    }
}
