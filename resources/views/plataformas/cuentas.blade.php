@include('template')
@include('nav')

<main class="main" id="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    @foreach ($cuentas as $cuenta)
                    <div class="card-body">
                        <h5 class="card-title">
                            Cuenta: {{ $cuenta->correo }}
                        </h5>
                        @foreach ($cuenta->perfiles as $perfil)
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Accordion Item #1
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            {{ $perfil->nombre }}
                                            {{ $perfil->contraseña }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

</main>