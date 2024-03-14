@include('template')
@include('nav')
<!-- resources/views/users.blade.php -->
    {{-- <div class="container">
        <h1>Lista de Usuarios</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID de Tarifa</th>
                    <th>Nombre de la Tarifa</th>
                    <th>Estado del Cliente</th>
                    <th>ID del cliente</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $userNumber = 1;
                @endphp
                @foreach($users as $user)
                    @if ($user->status != 'disabled')
                        <tr>
                            <td>{{$userNumber}}</td>
                            <td>{{ $user->tariff_id}}</td>
                            <td>{{ $user->description}}</td>
                            <td>{{ $user->status}}</td>
                            <td>{{ $user->customer_id}}</td>
                            <td>
                                <button onclick="mostrarInformacionCliente({{ $user->customer_id }})"></button>
                            </td>
                        </tr>
                    @endif
                        @php
                            $userNumber++;
                        @endphp
                    
                @endforeach
            </tbody>
        </table>
    </div> --}}

    <section id="horizontal-pricing" class="horizontal-pricing pt-0">
        <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>Lista de usuarios</h2>
                </div>
                @foreach($users as $user)
                    @if ($user->status != 'disabled')
                        <div class="row gy-4 pricing-item" data-aos="fade-up" data-aos-delay="100">
                            <div class="col-lg-3 d-flex align-items-center justify-content-center">
                                <h3>{{$user->tariff_id}}</h3>
                            </div>
                            <div class="col-lg-3 d-flex align-items-center justify-content-center">
                                <p>{{ $user->description}}</p>
                            </div>
                            <div class="col-lg-3 d-flex align-items-center justify-content-center">
                                <ul>
                                <li><i class="bi bi-check"></i> ID del cliente</li>
                                <li><i class="bi bi-check"></i>{{ $user->customer_id}}</li>
                                </ul>
                            </div>
                            <div class="col-lg-3 d-flex align-items-center justify-content-center">
                                <div class="text-center"><button onclick="mostrarInformacionCliente({{ $user->customer_id }})" class="buy-btn">Ver Cliente</button></div>
                            </div>
                        </div>
                    @endif
            @endforeach
        </div>
        
    </section>

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


