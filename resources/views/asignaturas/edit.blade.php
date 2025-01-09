@extends('layouts.general')
@section('content')
<div class="container">
  <form class="mt-2" name="create_platform" action="{{route('asignaturas.update',$asignatura)}}"
    method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group mb-3">
          <select name="ciclo_id">
            @foreach ($ciclos as $ciclo)
                <option value="{{ $ciclo->id }}"
                
                @if ($ciclo->id == old('myselect', $asignatura->ciclo_id))
                    selected="selected"
                @endif

                >{{ $ciclo->nombre }}</option>
            @endforeach
        </select>
        <label for="ciclo_id" class="form-label">Ciclo</label>
      </div>
      <div class="form-group mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-sm" id="nombre" name="nombre" required
        value="{{$asignatura->nombre}}"/>
      </div>
      <div class="form-group mb-3">
        <label for="descripcion" class="form-label">Descripcion</label>
        <textarea type="textarea" rows="2" class="form-control" id="descripcion" name="descripcion" required>
        {{$asignatura->descripcion}}
        </textarea>
      </div>
    <button type="submit" class="btn btn-primary" name="">Actualizar</button>
  </form>
</div>
@endsection