<!DOCTYPE html>
<html>
<head>
    <title>Editar Horario</title>
</head>
<body>
    <h1>Editar Horario</h1>

    <form action="{{ route('horarios.update', $horario->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="dia-semana">Día de la semana:</label>
        <select name="dia-semana" id="dia-semana">
            <option value="lunes" {{ $horario->dia_semana == 'lunes' ? 'selected' : '' }}>Lunes</option>
            <option value="martes" {{ $horario->dia_semana == 'martes' ? 'selected' : '' }}>Martes</option>
            <option value="miercoles" {{ $horario->dia_semana == 'miercoles' ? 'selected' : '' }}>Miércoles</option>
            <option value="jueves" {{ $horario->dia_semana == 'jueves' ? 'selected' : '' }}>Jueves</option>
            <option value="viernes" {{ $horario->dia_semana == 'viernes' ? 'selected' : '' }}>Viernes</option>
        </select><br>

        <label for="hora">Hora:</label>
        <select name="hora" id="hora">
            <option value="1" {{ $horario->hora == '1' ? 'selected' : '' }}>1</option>
            <option value="2" {{ $horario->hora == '2' ? 'selected' : '' }}>2</option>
            <option value="3" {{ $horario->hora == '3' ? 'selected' : '' }}>3</option>
            <option value="4"
