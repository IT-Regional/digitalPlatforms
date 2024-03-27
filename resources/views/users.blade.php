@include('template')
@include('nav')
<!-- resources/views/users.blade.php -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{route('home')}}">
          <i class="bi bi-grid"></i>
          <span>Inicio</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link " href="{{route('plataformas')}}">
          <i class="bi bi-grid"></i>
          <span>Plataformas</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link " href="{{route('users')}}">
          <i class="bi bi-grid"></i>
          <span>Clientes</span>
        </a>
      </li>

    </ul>

  </aside>
    <main class="main" id="main">
        <section id="horizontal-pricing" class="horizontal-pricing pt-0">
        <div class="container">
            <table class="table data">
                <thead>
                    <tr>
                        <th>
                            Servicio Recurrente
                        </th>
                        <th>Id del Cliente.</th>
                        <th>Ver Cliente</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        @if ($user['status'] != 'disabled' && $user['id'] != '148' && $user['id'] != '33')
                            <tr>
                                <td>{{ $user['description']}}</td>
                                <td>{{ $user['customer_id']}}</td>
                                <td>{{ $user['id']}}</td>
                                <td>
                                    <button onclick="mostrarInformacionCliente({{ $user['customer_id'] }})" type="button" class="btn btn-primary">
                                        <i class="ri-account-circle-line"></i>Ver Cliente
                                    </button>
                                </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
    <div class="container">
        {{ $users->links() }}
    </div>
    </main>

    <!-- resources/views/users.blade.php -->
<script>
    function mostrarInformacionCliente(customerId) {
        // Hacer una solicitud a la API para obtener la información del cliente
        fetch(`https://beesys.beenet.com.sv/api/2.0/admin/customers/customer/${customerId}`, {
            method: 'GET',
            headers: {
                'Authorization': 'Splynx-EA (access_token=' + '{{ session('customer_token') }}' + ')'
            }
        })
        .then(response => response.json())
        .then(data => {
            // Redirigir al usuario a la página de información del cliente con los datos del cliente
            window.location.href = `/customer_info/${customerId}`;
        })
        .catch(error => {
            console.error('Error al obtener la información del cliente:', error);
            alert('Error al obtener la información del cliente. Por favor, inténtelo de nuevo más tarde.');
        });
    }
</script>


