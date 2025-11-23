<?php

class Diario extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'diarios';

    protected $fillable = array('id','turma_id', 'periodo_id');

	public function turma()
    {
        return $this->belongsTo('Turma');
    }

	public function periodo()
    {
        return $this->belongsTo('Periodo');
    }

}