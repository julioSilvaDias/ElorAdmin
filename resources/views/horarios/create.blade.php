@extends('layouts.general')
<!DOCTYPE html>
<html>
<head>
    <title>Crear Horario</title>
</head>
<body>
    <h1>Crear Horario</h1>

    <form action="{{ route('horarios.store') }}" method="POST">
        @csrf
        <label for="dia-semana">Día de la semana:</label>
        <select name="dia-semana" id="dia-semana">
            <option value="lunes">Lunes</option>
            <option value="martes">Martes</option>
            <option value="miercoles">Miércoles</option>
            <option value="jueves">Jueves</option>
            <option value="viernes">Viernes</option>
        </select><br>

        <label for="hora">Hora:</label>
        <select name="hora" id="hora">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select><br>

        <label for="asignatura_id">Asignatura:</label>
        <input type="text" name="asignatura_id" id="asignatura_id"><br>

        <button type="submit">Crear Horario</button>
    </form>
</body>
</html>
