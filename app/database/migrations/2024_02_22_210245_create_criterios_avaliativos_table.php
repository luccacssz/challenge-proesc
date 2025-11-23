<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCriteriosAvaliativosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('criterios_avaliativos', function($table)
		{
			$table->increments('id');
			$table->string('nome');

			$table->integer('arredondamento_id')->unsigned();
			$table->foreign('arredondamento_id')->references('id')->on('arredondamentos');
			$table->integer('calculo_id')->unsigned();
			$table->foreign('calculo_id')->references('id')->on('calculos');

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
		Schema::dropIfExists('criterios_avaliativos');
	}

}