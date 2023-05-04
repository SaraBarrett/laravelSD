@extends('layouts.main')

@section('content')
    <div class="container">

        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <h2>Users</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <form method="GET">
                    <select class="custom-select" name="user_id" onchange="this.form.submit()">
                        <option value="" selected>Todos os Contactos</option>
                        @foreach ($allUsers as $item)
                            <option @if ($item->id == request()->query('user_id')) selected @endif value="{{ $item->id }}">
                                {{ $item->name }}</option>
                        @endforeach
                    </select>
                </form>
                @foreach ($contacts as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            <a href="{{ route('view_contact', $item->id) }}"> <button type="button"
                                    class="btn btn-info">Ver</button></a>
                            <a href="{{ route('delete_contact', $item->id) }}">
                                <button type="button" class="btn btn-danger">Apagar</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
        <h2>Tasks</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tarefa</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Nome Utilizador</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->usname }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
