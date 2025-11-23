<?php

class Calculo extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'calculos';

    protected $fillable = array('id', 'nome');

}