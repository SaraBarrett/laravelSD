@extends('layouts.main')

@section('title')
    <title>Adicionar Users</title>
@endsection

@section('content')
    <div class="container">
        <h1>Adicionar Utilizador</h1>

        <form method="POST" action="{{ route('create_task') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" name="name" value="" id="name"
                    aria-describedby="emailHelp">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Descrição</label>
                <input type="text" name="description" value=""
                    class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                @error('email')
                    <div class="invalid-feedback">
                        Pf coloque um email!
                    </div>
                @enderror
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <select class="custom-select" name="users_id" onchange="this.form.submit()">
                <option value="" selected>Todos os Contactos</option>
                @foreach ($users as $item)
                    <option value="{{ $item->id }}">
                        {{ $item->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


    <a href="{{ route('home') }}">Voltar</a>
@endsection
