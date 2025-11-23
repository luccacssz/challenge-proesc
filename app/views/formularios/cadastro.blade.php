@extends('layouts.main')

@section('title', 'CADASTRO DE PESSOA')

@section('content')
    <div class="container mt-5">
        <h2>Cadastro de Pessoa</h2>

        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        
        {{ Form::open(['url' => 'cadastrar-pessoa', 'method' => 'post']) }}

        <div class="form-group">
            {{ Form::label('nome', 'Nome') }}
            {{ Form::text('nome', null, ['class' => 'form-control', 'placeholder' => 'Digite seu nome']) }}
        </div>

        <div class="form-group">
            {{ Form::label('email', 'Email') }}
            {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Digite seu email']) }}
        </div>

        <div class="form-group">
            {{ Form::label('cpf', 'CPF') }}
            {{ Form::text('cpf', null, ['class' => 'form-control', 'placeholder' => 'Digite seu CPF']) }}
        </div>

        <div class="form-group">
            {{ Form::label('telefone', 'Telefone') }}
            {{ Form::text('telefone', null, ['class' => 'form-control', 'placeholder' => 'Digite seu telefone']) }}
        </div>

        <div class="form-group">
            {{ Form::submit('Cadastrar', ['class' => 'btn btn-primary']) }}
        </div>

        {{ Form::close() }}
    </div>
@endsection
