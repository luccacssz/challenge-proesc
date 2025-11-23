<?php

class Turma extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'turmas';

    protected $fillable = array('id', 'nome', 'criterio_avaliativo_id');

	public function criterio_avaliativo()
    {
        return $this->belongsTo('CriterioAvaliativo');
    }

}