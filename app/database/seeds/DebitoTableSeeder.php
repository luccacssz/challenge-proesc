<?php

class DebitoTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('debitos')->delete();

        for ($pessoa_id = 1; $pessoa_id  < 8; $pessoa_id++) {  
            Debito::create(array(
                'nome' => 'MENSALIDADE',
                'pessoa_id' => $pessoa_id
            ));
        }
    }
}