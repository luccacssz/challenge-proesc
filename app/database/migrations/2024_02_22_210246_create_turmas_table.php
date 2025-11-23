<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurmasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('turmas', function($table)
		{
			$table->increments('id');
			$table->string('nome');

			$table->integer('criterio_avaliativo_id')->unsigned();
			$table->foreign('criterio_avaliativo_id')->references('id')->on('criterios_avaliativos');
			
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
		Schema::dropIfExists('turmas');
	}

}