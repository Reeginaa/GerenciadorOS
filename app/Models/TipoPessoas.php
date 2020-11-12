<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPessoas extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
        'descricao'
    ];

    //Relação 1 para muitos - um TipoPessoa pode ter muitas pessoas
    public function pessoa()
    {
        return $this->hasMany(Pessoa::class, 'tipoPessoa_id');
    }
}
