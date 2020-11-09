<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusServico extends Model
{
    use HasFactory;


    protected $fillable = [
        'status',
        'descricaoStatus'
    ];

    //Relação 1 para muitos - Um status pode pertencer a várias OS
    public function ordemServico()
    {
        return $this->hasMany(OrdemServico::class, 'statusServico_id');
    }

    static function getStatusFechado()
    {
        return 6;
    }

    static function getStatusConcluido()
    {
        return 3;
    }

    static function getStatusInicio()
    {
        return 1;
    }
}
