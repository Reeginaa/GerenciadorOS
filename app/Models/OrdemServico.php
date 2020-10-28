<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdemServico extends Model
{
    use HasFactory;

    protected $fillable = [
        'dataInicio',
        'dataTermino',
        'defeito',
        'observacoesOS',
        'valorTotal',
        'termos',
        'assinatura',
        'statusServico_id',
        'pessoa_id',
        'equipamento_id'
    ];

    //relação 1 para muitos
    public function osServico()
    {
        return $this->hasMany(OSServico::class, 'ordemServico_id');
    }

    public function osPeca()
    {
        return $this->hasMany(OSPeca::class, 'ordemServico_id');
    }

    //Relação muitos para 1 - com status
    public function statusServico()
    {
        return $this->belongsTo(StatusServico::class, 'statusServico_id', 'id');
    }

    //Relação muitos para 1 - com pessoa
    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'pessoa_id', 'id');
    }

    // Relação muitos para 1 - com equipamento
    public function equipamento()
    {
        return $this->belongsTo(Equipamento::class, 'equipamento_id', 'id');
    }
}
