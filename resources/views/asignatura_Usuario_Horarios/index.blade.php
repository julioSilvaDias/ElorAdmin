@extends('layouts.app')
@section('content')
<div class="container">
  <h1>Horarios Profesores</h1>
  <a class="btn btn-primary btn-sm" href="{{route('asignatura_Usuario_Horarios.create')}}"
    role="button">Crear Horario Profesor</a><br/><br/>
  <ul>
    {{--esto es un comentario: recorremos el listado de asignaturas_usuarios_horarios--}}
    @foreach ($asignatura_Usuario_Horarios as $asignatura_Usuario_Horario)
      {{-- visualizamos los atributos del objeto --}}
      <li class="pt-1">
        <div class="d-flex flex-row">
          <a href="{{route('asignatura_Usuario_Horarios.show',$asignatura_Usuario_Horario)}}">{{$asignatura_Usuario_Horario->usuario_id}}</a>.
          {{$asignatura_Usuario_Horario->horario_id}}
          {{$asignatura_Usuario_Horario->asignatura_id}}
          Escrito el {{$asignatura_Usuario_Horario->created_at}}
          <a class="btn btn-warning btn-sm" href="{{route('asignatura_Usuario_Horarios.edit',$asignatura_Usuario_Horario)}}"
            role="button">Editar</a>
          <form action="{{route('asignatura_Usuario_Horarios.destroy',$asignatura_Usuario_Horario)}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger" type="submit"
              onclick="return confirm('¿Estás seguro?')">Borrar
            </button>
          </form>
        </div>
      </li>
    @endforeach
  </ul>
</div>
@endsection