<?php

class TurmaTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('turmas')->delete();
 
        Turma::create(array(
            'nome' => '7A',
            'criterio_avaliativo_id' => 2
        ));
    }
}