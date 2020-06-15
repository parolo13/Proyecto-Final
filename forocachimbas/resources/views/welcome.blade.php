<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css
        ">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css
        ">
        <!-- Styles -->
        <style>
            /* html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            } */
        </style>
    </head>
    <body>
        <div class="float-right mb-5">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}"><i class="fa fa-capitulo fa-3x" aria-hidden="true"></i>Usuario</a>
                    @else
                    
                    <a href="{{ route('login') }}" class="btn btn-outline-primary" role="button" aria-pressed="true">Login</a>   

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-outline-primary" role="button" aria-pressed="true">Registro</a>   
                        @endif
                    @endauth
                </div>
            @endif

           
        </div>
        @auth
        <a href="{{ route('foro.create',['user'=>\Auth::user()->id])}}" class="btn btn-primary ">Nuevo tema</a>
        @endauth
        <div class="mr-5 ml-5">
            @if ($capitulos->isNotEmpty())
            <table class="table" id="table">
                <thead>
                  <tr>
                    <th scope="col">Tema</th>
                    <th scope="col">Creado por</th>
                  </tr>
                </thead>
                <tbody>

                    @foreach ($capitulos as $capitulo)

                  <tr>
                  
                    <td><a href="{{route('foro.show',['foro'=>$capitulo])}}" class="btn btn-link"><i class="fas fa-eye"></i></span></a>{{$capitulo->tema}}</td>
                    <td> <a href="{{route('users.show',['user'=>$capitulo->usuario->id])}}" class="btn btn-link"><i class="fas fa-eye"></i></span></a>{{$capitulo->usuario->name}}</td>
                  </tr>
                  @endforeach
                 
                </tbody>
              </table>

              @else
              <p>No hay temas registrados.</p>
              @endif
        </div>
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
