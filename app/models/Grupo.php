<?php

class Grupo extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'grupos';

    protected $fillable = array('id', 'nome');

}