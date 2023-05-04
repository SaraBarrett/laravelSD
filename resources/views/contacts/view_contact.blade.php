@extends('layouts.main')

@section('title')
    <title>Adicionar Users</title>
@endsection

@section('content')
    <div class="container">
        <h1>Actualizar Utilizador</h1>

        <form method="POST" action="{{ route('update_contact') }}">
            @csrf

            <input type="hidden" name="id" value="{{ $ourUser->id }}">

            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" name="name" value="{{ $ourUser->name }}" id="name"
                    aria-describedby="emailHelp">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" value="{{ $ourUser->email }}"
                    class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                @error('email')
                    <div class="invalid-feedback">
                        Pf coloque um email!
                    </div>
                @enderror
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="password" value="{{ $ourUser->pasword }}" type="password" class="form-control"
                    id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
