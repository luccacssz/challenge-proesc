<?php

class ParcelaTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('parcelas')->delete();

        for ($debito_id = 1; $debito_id  < 8; $debito_id++) {
            $numero_parcelas = number_format(mt_rand(600, 1200) / 100, 0);

            while ($numero_parcelas > 0) {
                $valor = number_format(mt_rand(50000, 100000) / 100, 2);

                Parcela::create(array(
                    'valor' => $valor,
                    'pago'  => array_rand([true, false]),
                    'debito_id' => $debito_id
                ));

                $numero_parcelas--;
            }
        }
    }
}