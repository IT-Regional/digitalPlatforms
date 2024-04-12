@include('template')
@include('nav')

  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{route('home')}}">
          <i class="bi bi-grid"></i>
          <span>Inicio</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="ri-contacts-line"></i><span>Clientes</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('users')}}">
              <i class="bi bi-circle"></i><span>Ver Clientes</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="ri-base-station-line"></i><span>Plataformas</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('plataformas')}}">
              <i class="bi bi-circle"></i><span>Ver Plataformas</span>
            </a>
          </li>
          <li>
            <a href="{{route('plataformas.create')}}">
              <i class="bi bi-circle"></i><span>Agregar Plataformas</span>
            </a>
          </li>
        </ul>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#cuenta-nav" data-bs-toggle="collapse" href="#">
          <i class="ri-base-station-line"></i><span>Cuentas</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="cuenta-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('plataformas')}}">
              <i class="bi bi-circle"></i><span>Ver Cuentas</span>
            </a>
          </li>
          <li>
            <a href="{{route('cuentas.create')}}">
              <i class="bi bi-circle"></i><span>Agregar Cuenta</span>
            </a>
          </li>
        </ul>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#perfiles-nav" data-bs-toggle="collapse" href="#">
          <i class="ri-base-station-line"></i><span>Perfiles</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="perfiles-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('plataformas')}}">
              <i class="bi bi-circle"></i><span>Ver Perfiles</span>
            </a>
          </li>
          <li>
            <a href="{{route('perfiles.create')}}">
              <i class="bi bi-circle"></i><span>Agregar Perfil</span>
            </a>
          </li>
        </ul>
    </li>

    </ul>

  </aside>

  <main class="main" id="main">

    <form method="POST" action="{{ route('perfiles.store') }}">
      <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                <div class="d-flex justify-content-center py-4">
                  <a href="index.html" class="logo d-flex align-items-center w-auto">
                  </a>
                </div><!-- End Logo -->

                <div class="card mb-3">

                  <div class="card-body">

                    <form class="row g-3 needs-validation" method="POST" action="{{ route('perfiles.store') }}">
                      @csrf
                      <div class="col-12">
                        <label for="cuenta_id" class="form-label">Cuenta de la plataforma</label>
                        <select name="cuenta_id" id="cuenta_id" class="form-select" onchange="getCuentasByPlataforma()">
                            @foreach($plataformas as $plataforma)
                                <option value="{{ $plataforma->id }}">{{ $plataforma->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="correo" class="form-label">Correo</label>
                        <select name="correo" id="correo" class="form-select">
                            <!-- Correos se cargarán dinámicamente aquí -->
                        </select>
                    </div>
                      {{-- <label for="yourUsername" class="form-label">Cuenta de la plataforma</label>
                      <select name="cuenta_id" id="cuenta_id">
                            @foreach($cuentas as $cuenta)
                                <option value="{{ $cuenta->id }}">{{ $cuenta->correo }}</option>
                            @endforeach
                        </select> --}}
                      <div class="col-12">
                        <label for="yourUsername" class="form-label">Nombre del perfil</label>
                        <div class="input-group has-validation">
                          <input type="text" name="nombre" class="form-control" id="yourUsername" required>
                        </div>
                      </div>

                      <div class="col-12">
                        <label for="yourPassword" class="form-label">Contraseña</label>
                        <input type="text" name="contraseña" class="form-control" id="yourPassword" required>
                      </div>
                      <div class="col-12">
                        <label for="yourPassword" class="form-label">Fecha de Inicio</label>
                        <input type="date" name="fecha_inicio" class="form-control" id="yourPassword" required>
                      </div>
                      <div class="col-12">
                        <label for="yourPassword" class="form-label">Pin de Usuario</label>
                        <input type="number" name="pin_usuario" class="form-control" id="yourPassword" required>
                      </div>
                      <div class="col-12">
                        <label for="cliente" class="form-label">Cliente</label>
                        <select name="cliente" id="cliente">
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente }}">{{ $cliente }}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="col-12">
                        <button class="btn btn-primary w-100" type="submit">Registrar</button>
                      </div>
                    </form>

                  </div>
                </div>

              </div>
            </div>
          </div>

        </section>

      </div>
  </main>

<script>
    function getCuentasByPlataforma() {
        var plataformaId = document.getElementById('cuenta_id').value;
        fetch(`/get-cuentas-by-plataforma/${plataformaId}`)
            .then(response => response.json())
            .then(data => {
                var selectCorreo = document.getElementById('correo');
                selectCorreo.innerHTML = '';
                data.forEach(cuenta => {
                    var option = document.createElement('option');
                    option.value = cuenta.id;
                    option.textContent = cuenta.correo;
                    selectCorreo.appendChild(option);
                });
            });
    }
</script>