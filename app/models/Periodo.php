<?php

class Periodo extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'periodos';

    protected $fillable = array('id','nome');

}