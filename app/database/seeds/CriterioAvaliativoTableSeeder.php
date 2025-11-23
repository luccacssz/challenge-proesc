<?php

class CriterioAvaliativoTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('criterios_avaliativos')->delete();
 
        CriterioAvaliativo::create(array(
            'nome' => 'ENSINO FUNDAMENTAL I',
            'arredondamento_id' => 1,
            'calculo_id' => 1
        ));

        CriterioAvaliativo::create(array(
            'nome' => 'ENSINO FUNDAMENTAL II',
            'arredondamento_id' => 1,
            'calculo_id' => 1
        ));

        CriterioAvaliativo::create(array(
            'nome' => 'ENSINO MÉDIO',
            'arredondamento_id' => 2,
            'calculo_id' => 2
        ));
    }
}