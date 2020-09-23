<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


</head>

<body class="antialiased">


    <div class="container">
        <div class="row">
            @foreach($notes as $note)
            <div class="card col m-3" style="min-width:13rem; max-width:18rem;">
                <div class="card-body">
                    <h3 class="card-title">{{$note->title}}</h3>
                    <div class="card-content">{{$note->content}}</div>
                </div>
                <div class="card-footer">
                    <form method="POST" action="/{{$note->id}}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input type="submit" class="btn btn-danger delete-user" value="Eliminar" style="float:right;">
                    </form>
                </div>
            </div>
            @endforeach
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h3 class="card-title">Crea una nota!</h3>
                <form action="/" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Título</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Contenido</label>
                        <textarea name="content" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Postear</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>