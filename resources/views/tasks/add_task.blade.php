@extends('layouts.main')

@section('title')
    <title>Adicionar Users</title>
@endsection
@section('content')
    <div class="container">
        <h1>Adicionar Tarefa</h1>
        <form method="POST" action="{{ route('create_task') }}">
            @csrf
            <div class="mb-3">
                <label for="exampleInputBame1" class="form-label">Nome da Tarefa</label>
                <input type="name" class="form-control" name="name" value="" id="exampleInputName1"
                    aria-describedby="emailHelp">

                @error('name')
                    <div id="nameHelp" class="form-text">Insira um nome com um máximo de 50caracteres.</div>
                @enderror

            </div>
            <div class="mb-3">
                <label for="exampleInputDescription1" class="form-label">Descrição
                </label>
                <input name="description" type="text" value="" class="form-control" id="exampleInputDescription1"
                    aria-describedby="descriptionHelp">
                @error('description')
                    <div id="nameHelp" class="form-text">Descreva a Tarefa.</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Utilizador</label>
                <select class="custom-select" name="user_id">
                    <option value="" selected>Todos os Contactos</option>
                    @foreach ($allUsers as $item)
                        <option @if ($item->id == request()->query('user_id')) selected @endif value="{{ $item->id }}">
                            {{ $item->name }}</option>
                    @endforeach
                </select>

                @error('user_id')
                    <div id="nameHelp" class="form-text">Seleccione um User.</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <a href="{{ route('home') }}">Voltar</a>
@endsection
