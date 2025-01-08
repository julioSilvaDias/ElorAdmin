@extends('layouts.general')
@section('content')
<div class="container">
  <form class="mt-2" name="create_platform" action="{{route('asignatura_Usuario_Horarios.update',$asignatura_Usuario_Horario)}}"
    method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group mb-3">
        <label for="usuario_id" class="form-label">Usuario</label>
        <input type="number" class="form-sm" id="usuario_id" name="usuario_id" required
          value="{{$asignatura_Usuario_Horario->usuario_id}}"/>
      </div>
      <div class="form-group mb-3">
        <label for="horario_id" class="form-label">Horario</label>
        <input type="number" class="form-sm" id="horario_id" name="horario_id" required
          value="{{$asignatura_Usuario_Horario->horario_id}}"/>
      </div>
      <div class="form-group mb-3">
        <label for="asignatura_id" class="form-label">Asignatura</label>
        <input type="number" class="form-sm" id="asignatura_id" name="asignatura_id" required
          value="{{$asignatura_Usuario_Horario->asignatura_id}}"/>
      </div>
    <button type="submit" class="btn btn-primary" name="">Actualizar</button>
  </form>
</div>
@endsection