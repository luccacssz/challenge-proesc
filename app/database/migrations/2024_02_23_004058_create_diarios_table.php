<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('diarios', function($table)
		{
			$table->increments('id');

			$table->integer('turma_id')->unsigned();
			$table->foreign('turma_id')->references('id')->on('turmas');
			$table->integer('periodo_id')->unsigned();
			$table->foreign('periodo_id')->references('id')->on('periodos');

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
		Schema::dropIfExists('diarios');
	}

}