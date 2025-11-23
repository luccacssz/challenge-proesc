<?php

class PessoaTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('pessoas')->delete();
 
        Pessoa::create(array(
            'nome' => 'EDSON FELIPE DANILO BARBOSA',
            'email' => 'edson.felipe.barbosa@rafaelsouza.com.br',
            'cpf' => '62761212231',
            'telefone' => '95985235617',
            'grupo_id' => 1
        ));

        Pessoa::create(array(
            'nome' => 'ENRICO LUIZ ARAGÃO',
            'email' => 'enrico_aragao@suplementototal.com.br',
            'cpf' => '40305624938',
            'telefone' => '69998800972',
            'grupo_id' => 2
        ));

        Pessoa::create(array(
            'nome' => 'SEBASTIÃO CARLOS DA COSTA',
            'email' => 'sebastiao.carlos.dacosta@ppe.ufrj.br',
            'cpf' => '25299513496',
            'telefone' => '11982523119',
            'grupo_id' => 3
        ));

        Pessoa::create(array(
            'nome' => 'STELLA SOPHIA BRUNA COSTA',
            'email' => 'stellasophiacosta@pisbrasil.com.br',
            'cpf' => '54318390470',
            'telefone' => '86989096350',
            'grupo_id' => 3
        ));

        Pessoa::create(array(
            'nome' => 'PAULO FRANCISCO MORAES',
            'email' => 'paulo.francisco.moraes@gasparalmeida.com',
            'cpf' => '48124892024',
            'telefone' => '85998374383',
            'grupo_id' => 3
        ));

        Pessoa::create(array(
            'nome' => 'NICOLE JULIANA MARLI DIAS',
            'email' => 'nicole_dias@atualecomex.com.br',
            'cpf' => '79422422183',
            'telefone' => '86991061342',
            'grupo_id' => 3
        ));

        Pessoa::create(array(
            'nome' => 'IAGO IGOR DA CONCEIÇÃO',
            'email' => 'iago_daconceicao@poli.ufrj.br',
            'cpf' => '91468631098',
            'telefone' => '96997264563',
            'grupo_id' => 3
        ));
    }
}