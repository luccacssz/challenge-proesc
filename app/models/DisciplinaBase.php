<?php

class DisciplinaBase extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'disciplinas_bases';

    protected $fillable = array('id', 'nome');

}