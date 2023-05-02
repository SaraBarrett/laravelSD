@extends('layouts.main')

@section('title')
    <title>Home</title>
@endsection

@section('content')
    <div class="container">
        <h1>Olá, estou em casa</h1>

        <ul>
            <a href="{{ route('show_all_users') }}">
                <li>Todos os utilizadores</li>
            </a>
            <a href="{{ route('show_all_tasks') }}">
                <li>Todas as Tarefas</li>
            </a>
            <a href="{{ route('add_user') }}">
                <li>Adicionar Utilizador</li>
            </a>
        </ul>
    </div>


    {{--<h1> Vamos testar as variáveis!</h1>
    <h4>{{$aMinhaVariavel}}</h4>--}}
@endsection


@section('endcontent')
    {{-- <h2>sou fim do conteúdo</h2> --}}
@endsection
