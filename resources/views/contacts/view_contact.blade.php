@extends('layouts.main')

@section('title')
    <title>Adicionar Users</title>
@endsection

@section('content')
    <h1>Utilizador {{ $ourUser->name }}</h1>
    <h3>Nome:{{ $ourUser->name }}</h3>
    <h3>Pass:{{ $ourUser->password }}</h3>
    <h3>Criado em:{{ $ourUser->created_at }}</h3>
    <a href="{{ route('home') }}">Voltar</a>
@endsection
