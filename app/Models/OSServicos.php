<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OSServicos extends Model
{
    use HasFactory;

    protected $fillable = [
        'ordemServico_id',
        'servico_id',
        'valorServico'
    ];

    //Relação muitos para 1
    public function ordemServico()
    {
        return $this->belongsTo(OrdemServicos::class, 'ordemServico_id', 'id');
    }

    public function servico()
    {
        return $this->belongsTo(Servicos::class, 'servico_id', 'id');
    }
}
