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

                    <form class="row g-3 needs-validation" method="POST" action="{{ route('cuentas.store') }}">
                      @csrf
                      <label for="yourUsername" class="form-label">Plataforma</label>
                      <select id="plataforma_id" name="plataforma_id" required>
                            @foreach($plataformas as $plataforma)
                                <option value="{{ $plataforma->id }}">{{ $plataforma->nombre }}</option>
                            @endforeach
                        </select>
                      <div class="col-12">
                        <label for="yourUsername" class="form-label">Correo de la Cuenta</label>
                        <div class="input-group has-validation">
                          <input type="text" name="correo" class="form-control" id="yourUsername" required>
                          <div class="invalid-feedback">Please enter your username.</div>
                        </div>
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
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
