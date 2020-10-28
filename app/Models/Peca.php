<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peca extends Model
{
    use HasFactory;

    protected $fillable = [
        'item',
        'quantidade',
        'valorCompra',
        'valorVenda',
        'desconto',
    ];

    //Relação 1 para muitos 
    public function osPeca()
    {
        return $this->hasMany(OSPeca::class, 'peca_id');
    }
}
