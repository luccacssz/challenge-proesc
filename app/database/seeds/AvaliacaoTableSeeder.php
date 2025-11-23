<?php

class AvaliacaoTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('avaliacoes')->delete();
 
        Avaliacao::create(array(
            'nome' => 'AV1',
            'diario_id' => 1,
            'disciplina_id' => 1
        ));

        Avaliacao::create(array(
            'nome' => 'AV2',
            'diario_id' => 2,
            'disciplina_id' => 1
        ));

        Avaliacao::create(array(
            'nome' => 'AV3',
            'diario_id' => 3,
            'disciplina_id' => 1
        ));

        Avaliacao::create(array(
            'nome' => 'AV4',
            'diario_id' => 4,
            'disciplina_id' => 1
        ));

        Avaliacao::create(array(
            'nome' => 'AV1',
            'diario_id' => 1,
            'disciplina_id' => 2
        ));

        Avaliacao::create(array(
            'nome' => 'AV2',
            'diario_id' => 2,
            'disciplina_id' => 2
        ));

        Avaliacao::create(array(
            'nome' => 'AV3',
            'diario_id' => 3,
            'disciplina_id' => 2
        ));

        Avaliacao::create(array(
            'nome' => 'AV4',
            'diario_id' => 4,
            'disciplina_id' => 2
        ));

        Avaliacao::create(array(
            'nome' => 'AV1',
            'diario_id' => 1,
            'disciplina_id' => 3
        ));

        Avaliacao::create(array(
            'nome' => 'AV2',
            'diario_id' => 2,
            'disciplina_id' => 3
        ));

        Avaliacao::create(array(
            'nome' => 'AV3',
            'diario_id' => 3,
            'disciplina_id' => 3
        ));

        Avaliacao::create(array(
            'nome' => 'AV4',
            'diario_id' => 4,
            'disciplina_id' => 3
        ));

        Avaliacao::create(array(
            'nome' => 'AV1',
            'diario_id' => 1,
            'disciplina_id' => 4
        ));

        Avaliacao::create(array(
            'nome' => 'AV2',
            'diario_id' => 2,
            'disciplina_id' => 4
        ));

        Avaliacao::create(array(
            'nome' => 'AV3',
            'diario_id' => 3,
            'disciplina_id' => 4
        ));

        Avaliacao::create(array(
            'nome' => 'AV4',
            'diario_id' => 4,
            'disciplina_id' => 4
        ));

        Avaliacao::create(array(
            'nome' => 'AV1',
            'diario_id' => 1,
            'disciplina_id' => 5
        ));

        Avaliacao::create(array(
            'nome' => 'AV2',
            'diario_id' => 2,
            'disciplina_id' => 5
        ));

        Avaliacao::create(array(
            'nome' => 'AV3',
            'diario_id' => 3,
            'disciplina_id' => 5
        ));

        Avaliacao::create(array(
            'nome' => 'AV4',
            'diario_id' => 4,
            'disciplina_id' => 5
        ));
    }
}