<?php

class PessoasController extends BaseController {

    public function visualizarFormulario() {
        $grupos = Grupo::all();
        return View::make('formularios.cadastro', compact('grupos'));
    }

    public function cadastrarPessoa()
    {
        
        $rules = [
            'nome'     => 'required',
            'email'    => 'required|email',
            'cpf'      => 'required|cpf_valido',
            'telefone' => 'required',
            'grupo_id' => 'required|exists:grupos,id'
        ];

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
           return Redirect::back()->withInput()->withErrors($validator);
        }
        
        Pessoa::create([
            'nome'     => mb_strtoupper(Input::get('nome'), 'UTF-8'),
            'email'    => Input::get('email'),
            'cpf'      => Input::get('cpf'),
            'telefone' => Input::get('telefone'),
            'grupo_id' => Input::get('grupo_id')
        ]);

        return Redirect::to('/cadastro')->with('success', 'Cadastro realizado com sucesso!');
    }
}
