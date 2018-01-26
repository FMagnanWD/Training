@extends('adminlte::page')

@section('content_header')
    <h1>Mes informations</h1>
@stop

@section('content')

    {{ Form::open(['route' => ['teacher.settings.update']]) }}
        <div class="row">
            <div class="form-group col-md-3">
                {{ Form::label('username', 'Nom') }}
                {{ FORM::text('username', Auth::User()->name, ['name' => 'username', 'class' => 'form-control']) }}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3">
                {{ Form::label('old_pass', 'Mot de passe actuel') }}
                {{ Form::text('old_pass', '', ['name' => 'old_pass', 'class' => 'form-control']) }}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3">
                {{ Form::label('new_pass', 'Nouveau mot de passe') }}
                {{ Form::text('new_pass', '', ['name' => 'new_pass', 'class' => 'form-control']) }}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3">
                {{ Form::label('new_pass_confirm', 'Confirmer nouveau mot de passe') }}
                {{ Form::text('new_pass_confirm', '', ['name' => 'new_pass_confirm', 'class' => 'form-control']) }}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3">
                {{ Form::submit('Valider', ['class' => 'btn btn-primary col-md-12']) }}
            </div>
        </div>
    {{ Form::close() }}

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

    <script>
        $(document).ready(function () {

        })

    </script>
@stop
