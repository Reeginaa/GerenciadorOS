<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicos extends Model
{
    use HasFactory;

    protected $fillable = [
        'servico',
        'valor',
    ];

    //Relação 1 para muitos
    public function osServico()
    {
        return $this->hasMany(OSServico::class, 'servico_id');
    }
}
