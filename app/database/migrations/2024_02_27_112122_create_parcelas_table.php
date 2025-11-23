<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParcelasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('parcelas', function($table)
		{
			$table->increments('id');
			$table->double('valor');
			$table->boolean('pago');

			$table->integer('debito_id')->unsigned();
			$table->foreign('debito_id')->references('id')->on('debitos');

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
		Schema::dropIfExists('parcelas');
	}

}
