@include('template')
@include('nav')
<br>
<br>
<br>
<br>
<div class="container">
          @foreach ($plataformas as $plataforma)
<div class="col-xxl-4 col-md-6">
    <div class="card info-card revenue-card">

        <div class="card-body">
            <h5 class="card-title">{{ $plataforma->nombre }}</h5>

            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-currency-dollar"></i>
                </div>
                <div class="ps-3">
                    <h6>{{ $plataforma->perfiles_disponibles }}</h6>
                </div>
            </div>
        </div>

    </div>
</div>
@endforeach