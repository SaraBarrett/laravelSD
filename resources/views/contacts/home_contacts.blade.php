<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contactos</title>

    <link rel="stylesheet" href="{{ asset('CSS/style.css') }}">

    <script src="{{ asset('JS/app.js') }}" defer></script>
</head>

<body>
    <h1>Os meus Contactos</h1>
    <ul>
        <a href="{{ route('contacts.all') }}">
            <li>Ver todos</li>
        </a>
        <a href="{{ route('add_contact') }}">
            <li>Adicionar</li>
        </a>
        <a href="{{ route('add_task') }}">
            <li>Adicionar Tarefa</li>
        </a>
    </ul>

    <h2>{{ $myVar }}</h2>

    <h2>Informação a colocar nos Contactos</h2>
    <ul>
        <li>{{ $contactInfo['name'] }}</li>
        <li>{{ $contactInfo['phone'] }}</li>
    </ul>
</body>

</html>
