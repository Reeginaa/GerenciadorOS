<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomeMarca',
        'observacaoMarca'
    ];

    //Relação 1 para muitos - uma marca pode ter muitos equipamentos
    public function equipamento()
    {
        return $this->hasMany(Equipamento::class, 'marca_id');
    }
}
