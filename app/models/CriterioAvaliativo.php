<?php

class CriterioAvaliativo extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'criterios_avaliativos';

    protected $fillable = array('id', 'nome', 'arredondamento_id', 'calculo_id');

    public function arredondamento()
    {
        return $this->belongsTo('Arredondamento');
    }

	public function calculo()
    {
        return $this->belongsTo('Calculo');
    }

}