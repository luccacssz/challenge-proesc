<?php

class DiarioTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('diarios')->delete();
 
        Diario::create(array(
            'turma_id' => 1,
            'periodo_id' => 1
        ));

        Diario::create(array(
            'turma_id' => 1,
            'periodo_id' => 2
        ));

        Diario::create(array(
            'turma_id' => 1,
            'periodo_id' => 3
        ));

        Diario::create(array(
            'turma_id' => 1,
            'periodo_id' => 4
        ));
    }
}