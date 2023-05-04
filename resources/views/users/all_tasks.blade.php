@extends('layouts.main')

@section('title')
    <title>All Users</title>
@endsection

@section('content')
    <div class="container">
        <h2 class="text-center">Tasks</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Status</th>
                    <th scope="col">Nome Utilizador</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allTasks as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->usname }}</td>
                        <td>
                            <a href="{{ route('show_task', $item->id) }}"><button class="btn btn-info">Ver</button></a>
                            <a href="{{ route('delete_task', $item->id) }}"><button
                                    class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
        {{-- <h1>Olá, sou a lista de utilizadores</h1> --}}
    </div>

    {{-- <h4>teste de Array</h4> --}}

    {{-- <h5>{{ $oMeuArray['nome3'] }}</h5> --}}

    <h2>
        {{-- Info Cesae --}}
    </h2>
    {{-- <h5>{{ $cesaeInfo['address'] }} --}}</h5>
@endsection

@section('endcontent')
    {{-- fim do conteúdo de teste  --}}
@endsection
