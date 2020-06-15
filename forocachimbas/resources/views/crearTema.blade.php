<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Crear usuario</title>
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
<form method="POST" action="{{url('foros/'.$user->id)}}">
{!! csrf_field() !!}
<label for="tema">Tema:</label>
<input type="text" name="tema" id="tema" placeholder="tema" value="{{ old('tema')}}">
<br>
<label for="texto">Texto:</label><br>
<textarea name="texto" id="texto" cols="30" rows="5" value="{{ old('texto')}}" class="ml-3"></textarea>
<br>

<button type="submit">Crear capitulo</button>
    </form>
<a href="{{route('welcome')}}">Regresar al listado de capitulos</a>
</body>
</html>