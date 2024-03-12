@include('template')
<!-- resources/views/users.blade.php -->
    <div class="container">
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
                            {{-- {{dd($user)}} --}}
                        </tr>
                    @endif
                        @php
                            $userNumber++;
                        @endphp
                    
                @endforeach
            </tbody>
        </table>
    </div>

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


