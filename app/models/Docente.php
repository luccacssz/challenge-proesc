<?php

class Docente extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'docentes';

    protected $fillable = array('id', 'nome', 'pessoa_id');

    public function pessoa()
    {
        return $this->belongsTo('Pessoa');
    }

}