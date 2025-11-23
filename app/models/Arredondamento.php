<?php

class Arredondamento extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'arredondamentos';

    protected $fillable = array('id', 'nome');

}