<?php

use App\Conta;
use Illuminate\Database\Seeder;

class ContaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Conta::create(['saldo' => 1000, 'conta_block' => false]);
    }
}
