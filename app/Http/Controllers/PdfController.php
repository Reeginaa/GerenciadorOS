<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipamentos;
use App\Models\OrdemServicos;
use PDF;

class PdfController extends Controller
{
    public function geraPdf()
    {
        $equipamento = Equipamentos::all();

        $pdf = PDF::loadView('equipamentos.pdf', compact('equipamento'));

        return $pdf->setPaper('a4')->stream('Todos_equipamentos.pdf');
    }

    /*
    * Gerando PDF do comprovante
    * @param int $id
    */
    public function comprovante()
    {
        $ordemServico = OrdemServicos::all();

        $pdf = PDF::loadView('ordemServicos.comprovante', compact('ordemServico'));

        return $pdf->setPaper('a4')->stream('Comprovante_entrada.pdf');
    }

    public function imprimirOS()
    {
        $ordemServico = OrdemServicos::all();

        $pdf = PDF::loadView('ordemServicos.imprimirOS', compact('ordemServico'));

        return $pdf->setPaper('a4')->stream('Ordem_Servico.pdf');
    }
}
