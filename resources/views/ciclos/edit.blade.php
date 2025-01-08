@extends('layouts.general')
@section('content')
<div class="container">
  <form class="mt-2" name="create_platform" action="{{route('ciclos.update',$ciclo)}}"
    method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-sm" id="nombre" name="nombre" required
        value="{{$ciclo->nombre}}"/>
      </div>
    <div class="form-group mb-3">
        <label for="curso" class="form-label">Curso</label>
        <input type="number" class="form-sm" id="curso" name="curso" required
            value="{{$ciclo->curso}}"/>
      </div>
      <div class="form-group mb-3">
        <label for="descripcion" class="form-label">Descripcion</label>
        <textarea type="textarea" rows="2" class="form-control" id="descripcion" name="descripcion" required>
        {{$ciclo->descripcion}}
        </textarea>
      </div>
    <button type="submit" class="btn btn-primary" name="">Actualizar</button>
  </form>
</div>
@endsection