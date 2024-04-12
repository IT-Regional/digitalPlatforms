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
    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-20">
            <div class="row">
            @foreach ($cuentas as $cuenta)
              <div class="col-xxl-4 col-md-15">
              <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                      Cuenta: {{ $cuenta->correo }}
                    </h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td class="col"><b>Fecha de Inicio</b></td>
                                <td class="col"><b>Nombre del Perfil</b></td>
                                <td class="col"><b>Pin del Perfil</b></td>
                                <td class="col"><b>Tipo de Cliente</b></td>
                                <td class="col"><b>Id Cliente</b></td>
                            </tr>
                        </thead>
                          <tbody>
                            @foreach ($cuenta->perfiles as $perfil)
                              <tr>
                                    <td>{{ $perfil->fecha_inicio}}</td>
                                    <td>{{ $perfil->nombre }}</td>
                                    <td>{{ $perfil->pin_usuario }}</td>
                                    <td>{{ $perfil->cliente }}</td>
                                    <td>{{ $perfil->id }}</td>
                              </tr>
                            @endforeach  
                        </tbody>
                    </table>
                </div>
              </div>
              </div>
            @endforeach  
          </div>
        </div>
        </div>
    </section>
</main>