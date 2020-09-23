@extends('layouts.app')
@section('content')
<div class="row">
    @foreach($notes as $note)
    <div class="card col m-3" style="min-width:13rem; max-width:18rem;">
        <div class="card-body">
            <h3 class="card-title">{{$note->title}}</h3>
            <div class="card-content">{{$note->content}}</div>
        </div>
        <div class="card-footer">
            <div style="display:flex; justify-content:right">
                <button type="button" class="btn btn-primary mr-1" data-toggle="modal" data-target="#exampleModal" onclick="setForm({{ json_encode($note) }})">
                    Modificar
                </button>
                <form method="POST" action="/{{$note->id}}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="submit" class="btn btn-danger delete-user" value="Eliminar">
                </form>
            </div>
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
@endsection

@section('outsidecontainer')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modificar nota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Título</label>
                    <input type="text" class="form-control" name="title" id="modalFormTitleInput">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Contenido</label>
                    <textarea name="content" class="form-control" id="modalFormContentInput"></textarea>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="saveNote()" data-dismiss="modal">Guardar</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/setForm.js')}}"></script>
@endsection