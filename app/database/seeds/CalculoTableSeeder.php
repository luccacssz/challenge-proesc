<?php

class CalculoTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('calculos')->delete();

        Calculo::create(array(
            'nome' => 'MEDIA'
        ));

        Calculo::create(array(
            'nome' => 'SOMA'
        ));
    }
}