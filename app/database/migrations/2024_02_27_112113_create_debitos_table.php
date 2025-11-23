<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDebitosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('debitos', function($table)
		{
			$table->increments('id');
			$table->string('nome');

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
		Schema::dropIfExists('debitos');
	}

}
