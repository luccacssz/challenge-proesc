<?php

class Pessoa extends Eloquent {

    protected $table = 'pessoas';

    protected $fillable = [
        'nome',
        'email',
        'cpf',
        'telefone',
        'grupo_id'
    ];

    public function grupo()
    {
        return $this->belongsTo('Grupo');
    }
}