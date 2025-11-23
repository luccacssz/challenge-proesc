<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvaliacoesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('avaliacoes', function($table)
		{
			$table->increments('id');
			$table->string('nome');
			
			$table->integer('diario_id')->unsigned();
			$table->foreign('diario_id')->references('id')->on('diarios');
			$table->integer('disciplina_id')->unsigned();
			$table->foreign('disciplina_id')->references('id')->on('disciplinas');

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
		Schema::dropIfExists('avaliacoes');
	}

}