<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    protected $fillable = ['saldo', 'conta_block', 'cod_operacao'];

    public static function getConta()
    {
        return Conta::all()->last();
    }

    public static function postConta($dados)
    {
        if($dados->conta_block == null) $dados->conta_block = false;

        if($dados->saldo == null) $dados->saldo = Conta::all()->last()->saldo;

        Conta::create([
            'saldo' => $dados->saldo,
            'conta_block' => $dados->conta_block,
            'cod_operacao' => $dados->cod_operacao
        ]);

        /* cod_operacao
            1 - Depósito
            2 - Saque
        */
    }
}
