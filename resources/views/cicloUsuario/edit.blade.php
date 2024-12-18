<form action="{{ route('ciclo_usuario.update', $ciclo_usuario->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- Indicamos que es una actualización -->

    <div class="form-group">
        <label for="ciclo_id">Ciclo</label>
        <select name="ciclo_id" id="ciclo_id" class="form-control">
            <option value="">Selecciona un ciclo</option>
            @foreach($ciclos as $ciclo)
                <option value="{{ $ciclo->id }}" 
                    {{ $ciclo_usuario->ciclo_id == $ciclo->id ? 'selected' : '' }}>
                    {{ $ciclo->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="usuario_id">Usuario</label>
        <select name="usuario_id" id="usuario_id" class="form-control">
            <option value="">Selecciona un usuario</option>
            @foreach($usuarios as $usuario)
                <option value="{{ $usuario->id }}" 
                    {{ $ciclo_usuario->usuario_id == $usuario->id ? 'selected' : '' }}>
                    {{ $usuario->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
