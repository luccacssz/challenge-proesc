<?php

class Nota extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'notas';

    protected $fillable = array('id', 'nota', 'avaliacao_id', 'matricula_id');

	public function avalicao()
    {
        return $this->belongsTo('Avaliacao');
    }

	public function matricula()
    {
        return $this->belongsTo('Matricula');
    }

}