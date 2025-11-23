<?php

class Parcela extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'parcelas';

    protected $fillable = array('id', 'nome', 'valor', 'pago');

    public function debitos()
    {
        return $this->belongsTo('Debito');
    }

}