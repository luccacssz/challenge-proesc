@extends('layouts.main')

@section('title', 'CADASTRO DE PESSOA')

@section('content')
    <div class="container mt-5">
        <h2>Cadastro de Pessoa</h2>

        {{-- Mensagem de sucesso --}}
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        {{-- Exibir erros --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        {{ Form::open(['url' => 'cadastrar-pessoa', 'method' => 'post']) }}

        <div class="form-group">
            {{ Form::label('nome', 'Nome') }}
            {{ Form::text('nome', Input::old('nome'), ['class' => 'form-control', 'placeholder' => 'Digite seu nome']) }}
        </div>

        <div class="form-group">
            {{ Form::label('email', 'Email') }}
            {{ Form::email('email', Input::old('email'), ['class' => 'form-control', 'placeholder' => 'Digite seu email']) }}
        </div>

        <div class="form-group">
            {{ Form::label('cpf', 'CPF') }}
            {{ Form::text('cpf', Input::old('cpf'), ['class' => 'form-control', 'placeholder' => 'Digite seu CPF']) }}
        </div>

        <div class="form-group">
            {{ Form::label('telefone', 'Telefone') }}
            {{ Form::text('telefone', Input::old('telefone'), ['class' => 'form-control', 'placeholder' => 'Digite seu telefone']) }}
        </div>

        
        <div class="form-group">
            {{ Form::label('grupo_id', 'Grupo') }}
            {{ Form::select(
                'grupo_id',
                ['' => 'Selecione um grupo'] + $grupos->lists('nome', 'id'),
                Input::old('grupo_id'),
                ['class' => 'form-control']
            ) }}
        </div>

        <div class="form-group mt-3">
            {{ Form::submit('Cadastrar', ['class' => 'btn btn-primary']) }}
        </div>

        {{ Form::close() }}
    </div>
@endsection
