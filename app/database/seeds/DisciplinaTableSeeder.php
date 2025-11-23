<?php

class DisciplinaTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('disciplinas')->delete();

        Disciplina::create(array(
            'disciplina_base_id' => 1,
            'turma_id' => 1,
            'docente_id' => 1
        ));

        Disciplina::create(array(
            'disciplina_base_id' => 2,
            'turma_id' => 1,
            'docente_id' => 2
        ));

        Disciplina::create(array(
            'disciplina_base_id' => 3,
            'turma_id' => 1,
            'docente_id' => 3
        ));

        Disciplina::create(array(
            'disciplina_base_id' => 4,
            'turma_id' => 1,
            'docente_id' => 4
        ));

        Disciplina::create(array(
            'disciplina_base_id' => 5,
            'turma_id' => 1,
            'docente_id' => 5
        ));
    }
}