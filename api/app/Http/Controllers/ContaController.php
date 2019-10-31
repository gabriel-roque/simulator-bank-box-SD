<?php

namespace App\Http\Controllers;

use App\Conta;
use App\Historico;
use Illuminate\Http\Request;

class ContaController extends Controller
{
    public function get()
    {
        try {

            $conta = Conta::getConta();
            return response($conta, 200);

        } catch (\Exception $exception) {

            return response($exception, 404);

        }
    }

    public function post(Request $request)
    {

        try {

            Conta::postConta($request);
            return response(null, 200);

        } catch (\Exception $exception) {

            return response($exception, 404);

        }
    }


    public function history()
    {
        try {

            $historico = Historico::all();
            return response($historico->sortByDesc('id'), 200);

        } catch (\Exception $exception) {

            return response($exception, 404);

        }
    }

}
