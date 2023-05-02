<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Blade</title>
</head>

<body>
    @php
        $myStringVar = 'Sou uma string criada aqui';
    @endphp

    <h1>Sou uma Blade Laravel</h1>
    <p>{{ $myStringVar }}</p>


</body>
</html>
