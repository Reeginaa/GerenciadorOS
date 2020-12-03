<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdemServicos extends Model
{
    use HasFactory;

    protected $fillable = [
        'dataInicio',
        'dataTermino',
        'defeito',
        'observacoesOS',
        'valorTotal',
        'termos',
        'arquivo',
        'statusServico_id',
        'pessoa_id',
        'equipamento_id'
    ];

    //relação 1 para muitos
    public function osServico()
    {
        return $this->hasMany(OSServicos::class, 'ordemServico_id');
    }

    public function osPeca()
    {
        return $this->hasMany(OSPecas::class, 'ordemServico_id');
    }

    public function anexoOrcamento()
    {
        return $this->hasMany(AnexoOrcamento::class, 'ordemServico_id');
    }

    //Relação muitos para 1 - com status
    public function statusServico()
    {
        return $this->belongsTo(StatusServicos::class, 'statusServico_id', 'id');
    }

    //Relação muitos para 1 - com pessoa
    public function pessoa()
    {
        return $this->belongsTo(Pessoas::class, 'pessoa_id', 'id');
    }

    // Relação muitos para 1 - com equipamento
    public function equipamento()
    {
        return $this->belongsTo(Equipamentos::class, 'equipamento_id', 'id');
    }

    //botão fechar OS
    public function fecharOS($id)
    {
        $os = array('statusServico_id'=>6, 'dataTermino'=>date('Y-m-d'));
        return $this->find($id)->update($os);
    }
}
