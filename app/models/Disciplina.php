<?php

class Disciplina extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'disciplinas';

    protected $fillable = array('id', 'nome', 'disciplina_base_id', 'turma_id', 'docente_id');

    public function disciplina_base()
    {
        return $this->belongsTo('DisciplinaBase');
    }

	public function turma()
    {
        return $this->belongsTo('Turma');
    }

    public function docente()
    {
        return $this->belongsTo('Docente');
    }

}