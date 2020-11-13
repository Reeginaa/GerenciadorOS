<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pecas extends Model
{
    use HasFactory;

    protected $fillable = [
        'item',
        'quantidade',
        'valorCompra',
        'valorVenda',
    ];

    //Relação 1 para muitos
    public function osPeca()
    {
        return $this->hasMany(OSPecas::class, 'peca_id');
    }
}
