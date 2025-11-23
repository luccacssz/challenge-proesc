<?php

class DisciplinaBaseTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('disciplinas_bases')->delete();
 
        DisciplinaBase::create(array(
            'nome' => 'MATEMÁTICA'
        ));

        DisciplinaBase::create(array(
            'nome' => 'LÍNGUA PORTUGUESA'
        ));

        DisciplinaBase::create(array(
            'nome' => 'CIÊNCIAS'
        ));

        DisciplinaBase::create(array(
            'nome' => 'HISTÓRIA'
        ));

        DisciplinaBase::create(array(
            'nome' => 'GEOGRAFIA'
        ));
    }
}