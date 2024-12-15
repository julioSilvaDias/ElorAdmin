@extends('layouts.app')
@section('content')
  <div class="container">
    <form class="mt-2" name="create_platform"
       action="{{route('asignatura_Usuario_Horarios.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group mb-3">
        <label for="usuario_id" class="form-label">Usuario</label>
        <input type="number" class="form-sm" id="usuario_id" name="usuario_id" required/>
      </div>
      <div class="form-group mb-3">
        <label for="horario_id" class="form-label">Horario</label>
        <input type="number" class="form-sm" id="horario_id" name="horario_id" required/>
      </div>
      <div class="form-group mb-3">
        <label for="asignatura_id" class="form-label">Asignatura</label>
        <input type="number" class="form-sm" id="asignatura_id" name="asignatura_id" required/>
      </div>
      <button type="submit" class="btn btn-primary" name="">Crear</button>
    </form>
  </div>
@endsection