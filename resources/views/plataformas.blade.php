@include('template')
@include('nav')
<br>
<br>
<br>
<br>
<div class="container">
    <section class="section dashboard">
        <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-20">
            <div class="row">
            @foreach ($plataformas as $plataforma)
                <!-- Platform Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card customers-card">
                        
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-camera-reels-fill" style="color: #004260"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h5 class="card-title">Plataforma: {{ $plataforma->nombre }}</h5>
                                    </div>
                                </div>
                                <br>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>Perfiles Disponibles: {{ $plataforma->perfiles_disponibles }}</h6>
                                    </div>
                                </div>
                                <br>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-person-dash"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>Perfiles Ocupados: {{ $plataforma->perfiles_ocupados }}</h6>
                                    </div>
                                </div>
                                <br>
                                <button type="button" class="btn btn-primary">
                                    <i class="ri-account-circle-line"></i>Ver Perfiles
                                </button>
                            </div>
                    </div>
                </div><!-- End Platform Card-->
            @endforeach
            </div>
        </div>
        </div>
</section>
</div>