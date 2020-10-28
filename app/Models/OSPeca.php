<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OSPeca extends Model
{
    use HasFactory;

    protected $fillable = [
        'ordemServico_id',
        'peca_id',
        'valorPeca'
    ];

    //Relação muitos para 1
    public function ordemServico()
    {
        return $this->belongsTo(OrdemServico::class, 'ordemServico_id', 'id');
    }

    public function peca()
    {
        return $this->belongsTo(Peca::class, 'peca_id', 'id');
    }
}
