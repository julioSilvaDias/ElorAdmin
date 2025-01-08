@extends('layouts.app')

@section('content')
<h1>Editar Reunión</h1>
@include('reunions.form', [
    'action' => route('reunions.update', $reunion),
    'method' => 'PUT',
    'reunion' => $reunion
])
@endsection