<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    use HasFactory;

    protected $fillable =[
        'nomeEquipamento',
        'modelo',
        'numeroSerie',
        'observacoesEquipamento',
        'marca_id'
    ];

    //Relação 1 para muitos com OS - um equipamento pertence a varias OS
    public function ordemServico()
    {
        return $this->hasMany(OrdemServico::class, 'equipamento_id');
    }

    //Relação MUITOS para 1 - com marca
    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marca_id', 'id');
    }
}
