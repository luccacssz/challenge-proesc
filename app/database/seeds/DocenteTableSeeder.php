<?php

class DocenteTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('docentes')->delete();

        Docente::create(array(
            'pessoa_id' => 3
        ));

        Docente::create(array(
            'pessoa_id' => 4
        ));

        Docente::create(array(
            'pessoa_id' => 5
        ));

        Docente::create(array(
            'pessoa_id' => 6
        ));

        Docente::create(array(
            'pessoa_id' => 7
        ));
    }
}