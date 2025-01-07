@extends('layouts.app')

@section('content')
<h1>Crear Reunión</h1>
@include('reunions.form', [
    'action' => route('reunions.store'),
    'method' => 'POST',
    'reunion' => null
])
@endsection