<form method="POST" action="{{ route('plataformas.store') }}">
    @csrf
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required><br>

    <label for="perfiles_disponibles">Perfiles Disponibles:</label>
    <input type="number" id="perfiles_disponibles" name="perfiles_disponibles" required><br>

    <label for="perfiles_ocupados">Perfiles Ocupados:</label>
    <input type="number" id="perfiles_ocupados" name="perfiles_ocupados" required><br>

    <button type="submit">Guardar</button>
</form>
