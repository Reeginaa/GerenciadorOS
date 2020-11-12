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
        return $this->belongsTo(OrdemServico::class, 'ordemServico_id', 'id');
    }

    public function servico()
    {
        return $this->belongsTo(Servico::class, 'servico_id', 'id');
    }
}
