<?php

class NotaTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('notas')->delete();
 
        for ($avaliacao_id = 1; $avaliacao_id  < 21; $avaliacao_id++) {
            $nota = number_format(mt_rand(5000, 10000) / 100, 1);
            
            Nota::create(array(
                'nota' => $nota,
                'avaliacao_id' => $avaliacao_id,
                'matricula_id' => 1
            ));
        }
    }
}