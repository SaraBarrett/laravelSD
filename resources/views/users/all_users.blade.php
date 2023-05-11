@extends('layouts.main')

@section('title')
    <title>All Users</title>
@endsection

@section('content')
    <div class="container">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <h2 class="text-center">Utilizadores</h2>
        <form method="GET">
            <select class="custom-select" name="user_id" onchange="this.form.submit()">
                <option value="" selected>Todos os Contactos</option>
                @foreach ($allUsers as $item)
                    <option @if ($item->id == request()->query('user_id')) selected @endif value="{{ $item->id }}">
                        {{ $item->name }}</option>
                @endforeach
            </select>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Password</th>
                    <th scope="col">Email</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allUsers as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->password }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            <a href="{{ route('show_user', $item->id) }}"><button class="btn btn-info">Ver</button></a>
                            <a href="{{ route('delete_user', $item->id) }}"><button
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
