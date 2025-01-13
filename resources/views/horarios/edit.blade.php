@extends('layouts.general')

@section('content')
<div class="container">
    <h1>Editar Horario</h1>

    <form action="{{ route('horarios.update', $horario->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="dia-semana">Día de la semana:</label>
            <select name="dia-semana" id="dia-semana" class="form-control">
                <option value="lunes" {{ $horario->dia_semana == 'lunes' ? 'selected' : '' }}>Lunes</option>
                <option value="martes" {{ $horario->dia_semana == 'martes' ? 'selected' : '' }}>Martes</option>
                <option value="miercoles" {{ $horario->dia_semana == 'miercoles' ? 'selected' : '' }}>Miércoles</option>
                <option value="jueves" {{ $horario->dia_semana == 'jueves' ? 'selected' : '' }}>Jueves</option>
                <option value="viernes" {{ $horario->dia_semana == 'viernes' ? 'selected' : '' }}>Viernes</option>
            </select>
        </div>

        <div class="form-group">
            <label for="hora">Hora:</label>
            <select name="hora" id="hora" class="form-control">
                <option value="1" {{ $horario->hora == '1' ? 'selected' : '' }}>1</option>
                <option value="2" {{ $horario->hora == '2' ? 'selected' : '' }}>2</option>
                <option value="3" {{ $horario->hora == '3' ? 'selected' : '' }}>3</option>
                <option value="4" {{ $horario->hora == '4' ? 'selected' : '' }}>4</option>
                <option value="5" {{ $horario->hora == '5' ? 'selected' : '' }}>5</option>
                <option value="6" {{ $horario->hora == '6' ? 'selected' : '' }}>6</option>
            </select>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('horarios.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>

    </form>
</div>
@endsection