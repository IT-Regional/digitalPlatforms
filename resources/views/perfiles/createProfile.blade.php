<form method="POST" action="{{ route('perfiles.store') }}">
    @csrf
    <select name="cuenta_id" id="cuenta_id">
        @foreach($cuentas as $cuenta)
            <option value="{{ $cuenta->id }}">{{ $cuenta->correo }}</option>
        @endforeach
    </select>
    <br>
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required><br>

    <label for="contraseña">Contraseña:</label>
    <input type="password" id="contraseña" name="contraseña" required><br>

    <label for="fecha_inicio">Fecha de inicio:</label>
    <input type="date" id="fecha_inicio" name="fecha_inicio" required><br>

    <label for="pin_usuario">PIN de usuario:</label>
    <input type="number" id="pin_usuario" name="pin_usuario" required><br>

    <button type="submit">Guardar</button>
</form>
