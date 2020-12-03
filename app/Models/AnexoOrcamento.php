<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnexoOrcamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'nome_arquivo',
        'nome_arquivo_salvo',
        'ordemServico_id'
    ];

    //Relação muitos para 1
    public function ordemServico()
    {
        return $this->belongsTo(OrdemServicos::class, 'ordemServico_id', 'id');
    }
}
