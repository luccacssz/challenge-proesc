<?php

class PessoasController extends BaseController {

    public function visualizarFormulario() {
        return View::make('formularios.cadastro');
    }

    public function cadastrarPessoa() {

        return Redirect::to('/cadastro')->with('success', 'Cadastro realizado com sucesso!');
    }
}