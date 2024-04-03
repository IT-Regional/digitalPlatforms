<form method="POST" action="{{ route('cuentas.store') }}">
    @csrf
    <label for="plataforma_id">ID de la plataforma:</label>
    <input type="number" id="plataforma_id" name="plataforma_id" required><br>

    <label for="correo">Correo:</label>
    <input type="email" id="correo" name="correo" required><br>

    <label for="n_perfiles">Numero de Perfiles</label>
    <input type="number" name="n_perfiles" id="n_perfiles">

    <button type="submit">Guardar</button>
</form>
