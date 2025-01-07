@extends('layouts.app')

@section('content')
<h1>Detalles de la Reunión</h1>

<p><strong>Comentario:</strong> {{ $reunion->comentario }}</p>
<p><strong>Estado:</strong> {{ $reunion->estado }}</p>
<p><strong>Fecha y hora de inicio:</strong> {{ $reunion->fecha_hora_inicio }}</p>
<p><strong>Fecha y hora de fin:</strong> {{ $reunion->fecha_hora_fin }}</p>
<p><strong>Emisor:</strong> {{ $reunion->emisor?->name ?? 'Sin emisor' }}</p>
<p><strong>Receptor:</strong> {{ $reunion->receptor?->name ?? 'Sin receptor' }}</p>

<a href="{{ route('reunions.index') }}">Volver</a>
@endsection
