<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notas', function($table)
		{
			$table->increments('id');
			$table->float('nota');

			$table->integer('avaliacao_id')->unsigned();
			$table->foreign('avaliacao_id')->references('id')->on('avaliacoes');
			$table->integer('matricula_id')->unsigned();
			$table->foreign('matricula_id')->references('id')->on('matriculas');

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
		Schema::dropIfExists('notas');
	}

}