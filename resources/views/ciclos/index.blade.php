@extends('layouts.general')
@section('content')
<div class="container">
  <h1>Ciclos</h1>
  <a class="btn btn-primary btn-sm" href="{{route('ciclos.create')}}"
    role="button">Crear Ciclo</a><br/><br/>
  <ul>
    {{--esto es un comentario: recorremos el listado de ciclos--}}
    @foreach ($ciclos as $ciclo)
      {{-- visualizamos los atributos del objeto --}}
      <li class="pt-1">
        <div class="d-flex flex-row">
          <a href="{{route('ciclos.show',$ciclo)}}">{{$ciclo->nombre}}</a>.
          {{$ciclo->curso}}
          {{$ciclo->descripcion}}
          Escrito el {{$ciclo->created_at}}
          <a class="btn btn-warning btn-sm" href="{{route('ciclos.edit',$ciclo)}}" role="button" title="Editar">
            <i class="bi bi-pencil"></i>
          </a>
          <form action="{{route('ciclos.destroy',$ciclo)}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('¿Estás seguro?')" title="Eliminar">
              <i class="bi bi-trash"></i>
            </button>
          </form>
        </div>
      </li>
    @endforeach
  </ul>
</div>
@endsection