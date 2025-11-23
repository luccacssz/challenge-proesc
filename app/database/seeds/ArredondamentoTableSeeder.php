<?php

class ArredondamentoTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('arredondamentos')->delete();

        Arredondamento::create(array(
            'nome' => 'FRAÇÕES SÃO ARREDONDADAS PARA CIMA'
        ));

        Arredondamento::create(array(
            'nome' => 'FRAÇÕES SÃO ARREDONDADAS PARA BAIXO'
        ));
    }
}