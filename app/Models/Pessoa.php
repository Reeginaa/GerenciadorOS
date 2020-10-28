<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cpf',
        'rg',
        'dataNascimento',
        'sexo',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'email',
        'senha',
        'telefone',
        'tipoPessoa_id'
    ];

    //Relação 1 para muitos - Uma pessoa pode ter várias ordens de servico
    public function ordemServico()
    {   
        return $this->hasMany(OrdemServico::class, 'pessoa_id');
    }

    //Relação MUITOS para 1 - com tipo pessoa
    public function tipoPessoa()
    {
        return $this->belongsTo(TipoPessoa::class, 'tipoPessoa_id', 'id');
    }
}
