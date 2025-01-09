<form action="{{ route('ciclo_usuario.destroy', $cicloUsuario->id) }}" method="POST" style="display: inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este ciclo de usuario?')">Eliminar</button>
</form>
