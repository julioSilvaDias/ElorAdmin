<ul>
  {{--esto es un comentario: recorremos el listado de roles--}}
  @foreach ($roles as $rol)
    {{-- visualizamos los atributos del objeto --}}
    <li>
      {{$rol->name}}
      Escrito el {{$rol->created_at}}
    </li>
  @endforeach
</ul>