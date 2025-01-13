
<form action="{{ $action }}" method="POST">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif

    <label>Comentario:</label>
    <input type="text" name="comentario" value="{{ $reunion->comentario ?? '' }}">

    <label>Estado:</label>
    <select name="estado">
        <option value="pendiente" {{ (isset($reunion) && $reunion->estado === 'pendiente') ? 'selected' : '' }}>Pendiente</option>
        <option value="aceptado" {{ (isset($reunion) && $reunion->estado === 'aceptado') ? 'selected' : '' }}>Aceptado</option>
        <option value="rechazado" {{ (isset($reunion) && $reunion->estado === 'rechazado') ? 'selected' : '' }}>Rechazado</option>
    </select>

    <label>Fecha y hora de inicio:</label>
    <input type="datetime-local" name="fecha-hora-inicio" value="{{ $reunion->{'fecha-hora-inicio'} ?? '' }}">

    <label>Fecha y hora de fin:</label>
    <input type="datetime-local" name="fecha-hora-fin" value="{{ $reunion->{'fecha-hora-fin'} ?? '' }}">

    <label>Emisor ID:</label>
    <input type="number" name="emisor_id" value="{{ $reunion->emisor_id ?? '' }}">

    <label>Receptor ID:</label>
    <input type="number" name="receptor_id" value="{{ $reunion->receptor_id ?? '' }}">

    <button type="submit">Guardar</button>
</form>