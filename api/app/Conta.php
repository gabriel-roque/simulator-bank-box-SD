<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    protected $fillable = ['saldo', 'status'];

    public static function getConta()
    {
        return Conta::all()->last();
    }


    public static function postConta($dados)
    {

        if(!$dados->status) $dados->status = false;

        $historicoNao = true;
        if(!$dados->saldo){
            $historicoNao = false;
            $dados->saldo = Conta::all()->last()->saldo;
        }

        Conta::find(1)->update([
            'saldo' => $dados->saldo,
            'status' => $dados->status,
            ]);
        if($historicoNao)  Historico::setHistorico($dados);

    }
}
