<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de usuarios</title>
</head>
<body>
    <h1>Usuario #{{$user->id}}</h1>
<h2>Nombre del usuario: {{$user->name}}</h2>
<h2>Correo del usuario: {{$user->email}}</h2>
<a href="{{route('welcome')}}">Regresar al listado de usuarios</a>
</body>
</html>