<?php

namespace App\Http\Controllers;

use App\Models\AnexoOrcamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnexoOrcamentoController extends Controller
{
    /**
     * Função para realizar download do arquivo
     *
     * @param int $id o id do anexo
     */
    public function download($id)
    {
        $anexo = AnexoOrcamento::find($id);

        return Storage::download(
            'documents/' . $anexo->nome_arquivo_salvo,
            $anexo->nome_arquivo
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $anexo = $request->file('arquivo');
        $documentData = [
            'ordemServico_id' => $request->input('ordemServico_id'),
            'nome' => $request->input('nome'),
            'nome_arquivo' => $anexo->getClientOriginalName(),
            'nome_arquivo_salvo' => $anexo->hashName(),
        ];

        $criar = AnexoOrcamento::create($documentData);

        Storage::putFile('documents/', $anexo);

        return redirect('ordemServicos/' . $request->all()['ordemServico_id'] . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnexoOrcamento  $anexoOrcamento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anexo = AnexoOrcamento::find($id);
        $anexoPath = 'documents/' . $anexo->nome_arquivo_salvo;
        $anexo->delete();
        Storage::delete($anexoPath);
        return ['status' => 'success'];
    }
}
