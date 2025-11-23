<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('GrupoTableSeeder');
		$this->call('PessoaTableSeeder');
		$this->call('ArredondamentoTableSeeder');
		$this->call('CalculoTableSeeder');
		$this->call('CriterioAvaliativoTableSeeder');
		$this->call('TurmaTableSeeder');
		$this->call('MatriculaTableSeeder');
		$this->call('DisciplinaBaseTableSeeder');
		$this->call('DocenteTableSeeder');
		$this->call('DisciplinaTableSeeder');
		$this->call('PeriodoTableSeeder');
		$this->call('DiarioTableSeeder');
		$this->call('AvaliacaoTableSeeder');
		$this->call('NotaTableSeeder');
		$this->call('DebitoTableSeeder');
		$this->call('ParcelaTableSeeder');
	}

}
