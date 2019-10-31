<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    protected $fillable = ['valor', 'conta_id', 'cod_operacao'];

    public static function setHistorico($dados)
    {
      return  Historico::create([
            'valor' => $dados->saldo,
            'conta_id' =>  1,
            'cod_operacao' => $dados->cod_operacao
        ]);

        /* cod_operacao
            1 - Depósito
            2 - Saque
        */
    }
}
