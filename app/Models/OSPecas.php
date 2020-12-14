<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OSPecas extends Model
{
    use HasFactory;

    protected $fillable = [
        'qtd',
        'valor_total',
        'ordemServico_id',
        'peca_id',
        'valorPeca'
    ];

    //Relação muitos para 1
    public function ordemServico()
    {
        return $this->belongsTo(OrdemServicos::class, 'ordemServico_id', 'id');
    }

    public function peca()
    {
        return $this->belongsTo(Pecas::class, 'peca_id', 'id');
    }
}
