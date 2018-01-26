@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

    <p>Le tuto pour les Roles: <a href="https://medium.com/@ezp127/laravel-5-4-native-user-authentication-role-authorization-3dbae4049c8a" target="_blank">Ici</a></p>

    {{ $test }} :<br>
    Votre ID utilisateur est {{ $user_id }}
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