<?php

class GrupoTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('grupos')->delete();
 
        Grupo::create(array(
            'nome' => 'RESPONSÁVEL'
        ));

        Grupo::create(array(
            'nome' => 'ESTUDANTE'
        ));

        Grupo::create(array(
            'nome' => 'DOCENTE'
        ));
    }
}