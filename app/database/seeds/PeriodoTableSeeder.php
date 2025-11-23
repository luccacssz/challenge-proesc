<?php

class PeriodoTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('periodos')->delete();
 
        Periodo::create(array(
            'nome' => '1° PERÍODO'
        ));

        Periodo::create(array(
            'nome' => '2° PERÍODO'
        ));
        
        Periodo::create(array(
            'nome' => '3° PERÍODO'
        ));
        
        Periodo::create(array(
            'nome' => '4° PERÍODO'
        ));
    }
}