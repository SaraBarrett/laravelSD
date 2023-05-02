<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Blade</title>


</head>

<body>
    <h1>Cucu, sou uma blade Laravel</h1>
    <?php
    $myVar = 'sou uma variável de Php simples';
    echo $myVar;
    ?>
    <br>
    @php
        $myVarLaravel = 'sou uma variável de Php laravel';

        $myEmptyVar = null;

        if($myEmptyVar != null){
            echo $myEmptyVar;
        }else{
            echo $myVarLaravel;
        }

        $myNumber = 10;
    @endphp

    {{ $myVarLaravel }}
    <h1> {{ $myVarLaravel }}</h1>




    @if(!@empty($myEmptyVar))
        {{$myEmptyVar}}
    @else
    <h1>hello</h1>
        {{$myVarLaravel}}
    @endif

    <br>
    {{var_dump($myNumber)}}
</body>

</html>
