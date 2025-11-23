<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatriculasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('matriculas', function($table)
		{
			$table->increments('id');
			
			$table->integer('turma_id')->unsigned();
			$table->foreign('turma_id')->references('id')->on('turmas');
			$table->integer('pessoa_id')->unsigned();
			$table->foreign('pessoa_id')->references('id')->on('pessoas');

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
		Schema::dropIfExists('matriculas');
	}

}