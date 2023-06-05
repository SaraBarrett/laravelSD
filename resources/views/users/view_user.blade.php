@extends('layouts.main')

@section('title')
    <title>Editar User</title>
@endsection

@section('content')
    <form action="{{ route('update_user') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <h1>Editar User</h1>

            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input value="{{ $ourUser->name }}" name="name" type="text" class="form-control" id="name">
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label">Foto</label>
                <input value="" name="photo" type="file" accept="images/*" class="form-control" id="photo">
                <input type="hidden" name="id" value="{{ $ourUser->id }}">
            </div>

            <button class="btn btn-info" type="submit">Editar</button>

        </div>

    </form>
    {{-- <h1> Vamos testar as variáveis!</h1>
    <h4>{{$aMinhaVariavel}}</h4> --}}
@endsection


@section('endcontent')
    {{-- <h2>sou fim do conteúdo</h2> --}}
@endsection
