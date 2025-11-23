<?php

class Matricula extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'matriculas';

    protected $fillable = array('id', 'turma_id', 'pessoa_id');

    public function turma()
    {
        return $this->belongsTo('Turma');
    }

    public function pessoa()
    {
        return $this->belongsTo('Pessoa');
    }

}