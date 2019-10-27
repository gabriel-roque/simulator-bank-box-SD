<?php

namespace App\Http\Controllers;

use App\Conta;
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

}
