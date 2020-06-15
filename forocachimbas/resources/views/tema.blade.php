<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css
    ">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css
    ">
    <title>Lista de usuarios</title>
</head>
<body>
<h1>#{{$foro->id}}</h1>
<h2>Tema: {{$foro->tema}}</h2>
<h2>Texto: {{$foro->texto}}</h2>

<br>
<h6>Escrito por: {{$foro->usuario->name}}</h6>
<br>


@if ($comentarios->isNotEmpty())

<table class="table" id="table">
    <thead>
      <tr>
        <th scope="col">Respuesta</th>
        <th scope="col">Creado por</th>
        <th scope="col">Likes</th>
      </tr>
    </thead>
    <tbody>

        @foreach ($comentarios as $comentario)
        <tr>
                  
            <td>{{$comentario->texto}}</td>
            <td> <a href="{{route('users.show',['user'=>$comentario->usuario->id])}}" class="btn btn-link"><i class="fas fa-eye"></i></span></a>{{$comentario->usuario->name}}</td>
        <td>{{$comentario->like}}</td>
          </tr>
          @endforeach
          @endif

<br>

<a href="{{ route('respuesta.create',['user'=>$foro->usuario->id, 'foro'=>$foro->id]) }}" class="btn btn-outline-primary" role="button" aria-pressed="true">Responder</a>
<br>
<a href="{{route('welcome')}}">Regresar al listado de usuarios</a>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js
        "></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js
        "></script>
        <script>
          var table = $('#table').DataTable({
  language: {
      "decimal": "",
      "emptyTable": "No hay información",
      "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
      "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
      "infoFiltered": "(Filtrado de _MAX_ total entradas)",
      "infoPostFix": "",
      "thousands": ",",
      "lengthMenu": "Mostrar _MENU_ Entradas",
      "loadingRecords": "Cargando...",
      "processing": "Procesando...",
      "search": "Buscar:",
      "zeroRecords": "Sin resultados encontrados",
      "paginate": {
          "first": "Primero",
          "last": "Ultimo",
          "next": "Siguiente",
          "previous": "Anterior"
      }
  },
});
      </script>
      <script>
          $(document).ready(function() {
  $(table).DataTable();
} );
      </script>
</body>
</html>