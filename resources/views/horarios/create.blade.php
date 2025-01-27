@extends('layouts.general')

@section('content')
<h1>Crear Horario</h1>

<form action="{{ route('horarios.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="dia-semana">Día de la semana:</label>
        <select name="dia-semana" id="dia-semana" class="form-control">
            <option value="lunes">Lunes</option>
            <option value="martes">Martes</option>
            <option value="miercoles">Miércoles</option>
            <option value="jueves">Jueves</option>
            <option value="viernes">Viernes</option>
        </select>
    </div>

    <div class="form-group">
        <label for="hora">Hora:</label>
        <select name="hora" id="hora" class="form-control">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select>
    </div>

    <div class="form-group">
        <label for="asignatura_id">Asignatura:</label>
        <select name="asignatura_id" id="asignatura_id">
            @foreach($asignaturas as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select><br>

    </div>

    <div class="form-group">
        <label for="profesor_id">Profesor:</label>
        <select name="profesor_id" id="profesor_id" class="form-control">
            @foreach($profesores as $profesor)
                <option value="{{ $profesor->id }}">{{ $profesor->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</form>
@endsection