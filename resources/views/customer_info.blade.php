@include('template')

<div class="container">
    <h1>Información del Cliente</h1>
    <p>Nombre: {{ $customerInfo->name }}</p>
    <p>Email: {{ $customerInfo->email }}</p>
    <p>Teléfono: {{ $customerInfo->phone }}</p>
    <p>Fecha de inicio: {{$bundleInfo[0]->start_date}}</p>
</div>
