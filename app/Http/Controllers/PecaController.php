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
        $pecas = Peca::all();

        return view('pecas.listPeca', compact('pecas'));
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
            'item' => 'required',
            'quantidade' => 'required',
            'valorCompra' => 'required',
            'valorVenda' => 'required'
        ]);

        $peca = new Peca([
            'item' => $request->get('item'),
            'quantidade' => $request->get('quantidade'),
            'valorCompra' => $request->get('valorCompra'),
            'valorVenda' => $request->get('valorVenda'),
            'desconto' => $request->get('desconto')
        ]);

        $peca->save();
        return redirect('/pecas')->with('success', 'Peça inserida com sucesso!!!');
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
        return view('pecas.editPeca', compact('peca'));
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
            'item' => 'required',
            'quantidade' => 'required',
            'valorCompra' => 'required',
            'valorVenda' => 'required'
        ]);

        $peca->Peca::find($id);
        $peca->item = $request->get('item');
        $peca->quantidade = $request->get('quantidade');
        $peca->valorCompra = $request->get('valorCompra');
        $peca->valorVenda = $request->get('valorVenda');
        $peca->desconto = $request->get('desconto');
        $peca->save();

        return redirect('/pecas')->with('success', 'Peça alterada com sucesso!!!');
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

        return redirect('/pecas')->with('success', 'Peça excluída com sucesso!!!');
    }
}
