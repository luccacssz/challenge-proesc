<?php

class Debito extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'debitos';

    protected $fillable = array('id', 'nome', 'valor_total');

}