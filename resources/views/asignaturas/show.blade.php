@extends('layouts.app')
@section('content')
<div class=container>
    <h1>{{$asignatura->nombre}}</h1>
    <p>{{$asignatura->descripcion}}</p>
    <p>{{$asignatura->ciclo_id}}</p>
    <p>Escrito el {{$asignatura->created_at}}</p>
</div>
@endsection