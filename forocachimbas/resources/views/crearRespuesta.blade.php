<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Crear respuesta</title>
</head>
<body>
    @if($errors->any())
    <div class="alert alert-danger">
        <h5>Por favor corrige los siguientes errores</h5>

        <ul>
            @foreach ($errors->all() as $error)
        <li>{{$error}}</li>   
            @endforeach
        </ul>
</div>
    @endif
<form method="POST" action="{{url('respuesta/'.\Auth::user()->id.'/'.$foro->id)}}">
{!! csrf_field() !!}
<label for="respuesta">Respuesta:</label>
<input type="text" name="respuesta" id="respuesta" placeholder="respuesta" value="{{ old('respuesta')}}">
<br>

<button type="submit">Crear respuesta</button>
    </form>
<a href="{{url('foro/'.$foro->id)}}">Regresar al comentario</a>
</body>
</html>