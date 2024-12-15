@extends('layouts.app')
@section('content')
<div class=container>
    <h1>{{$asignatura_Usuario_Horario->usuario_id}}</h1>
    <p>{{$asignatura_Usuario_Horario->horario_id}}</p>
    <p>{{$asignatura_Usuario_Horario->asignatura_id}}</p>
    <p>Escrito el {{$asignatura_Usuario_Horario->created_at}}</p>
</div>
@endsection