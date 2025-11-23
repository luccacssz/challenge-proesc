<?php

class Avaliacao extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'avaliacoes';

    protected $fillable = array('id', 'nome', 'diario_id', 'disciplina_id');

	public function diario()
    {
        return $this->belongsTo('Diario');
    }

	public function disciplina()
    {
        return $this->belongsTo('Disciplina');
    }

}