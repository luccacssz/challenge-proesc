<?php

class MatriculaTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('matriculas')->delete();
 
        Matricula::create(array(
            'turma_id' => 1,
            'pessoa_id' => 2
        ));
    }
}