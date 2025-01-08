@extends('layouts.general')
@section('content')
<div class=container>
    <h1>{{$ciclo->nombre}}</h1>
    <p>{{$ciclo->curso}}</p>
    <p>{{$ciclo->descripcion}}</p>
    <p>Escrito el {{$ciclo->created_at}}</p>
</div>
@endsection