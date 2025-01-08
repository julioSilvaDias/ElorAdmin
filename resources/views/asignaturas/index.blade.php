@extends('layouts.app')
@section('content')
<div class="container">
  <h1>Asignaturas</h1>
  <a class="btn btn-primary btn-sm" href="{{route('asignaturas.create')}}"
    role="button">Crear Asignatura</a><br/><br/>
  <ul>
    {{--esto es un comentario: recorremos el listado de asignaturas--}}
    @foreach ($asignaturas as $asignatura)
      {{-- visualizamos los atributos del objeto --}}
      <li class="pt-1">
        <div class="d-flex flex-row">
          <a href="{{route('asignaturas.show',$asignatura)}}">{{$asignatura->nombre}}</a>.
          {{$asignatura->descripcion}}
          {{$asignatura->ciclo_id}}
          Escrito el {{$asignatura->created_at}}
          <a class="btn btn-warning btn-sm" href="{{route('asignaturas.edit',$asignatura)}}"
            role="button">Editar</a>
          <form action="{{route('asignaturas.destroy',$asignatura)}}" method="POST">
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