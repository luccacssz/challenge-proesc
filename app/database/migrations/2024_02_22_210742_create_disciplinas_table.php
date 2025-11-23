<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisciplinasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('disciplinas', function($table)
		{
			$table->increments('id');
			
			$table->integer('disciplina_base_id')->unsigned();
			$table->foreign('disciplina_base_id')->references('id')->on('disciplinas_bases');
			$table->integer('turma_id')->unsigned();
			$table->foreign('turma_id')->references('id')->on('turmas');
			$table->integer('docente_id')->unsigned();
			$table->foreign('docente_id')->references('id')->on('docentes');

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('disciplinas');
	}

}