@extends("layouts.landing")

@section("content-page")
<div>
        <div class="main-section-bg" style="position:relative;">

            <div class="bg-ic">

            </div>
            <div class=about-section>
                <div class="d-flex flex-column about-sub">
                    <div class="about-title-container mx-auto mb-1">
                        <h6 class="about-title">¿En qué consiste?</h6>
                    </div>
                    <div class="d-flex flex-row flex-wrap justify-content-center py-3 pb-5">
                        <div class="col-8 col-sm-3 col-md-3 col-lg-3 p-2 my-2">
                            <div class="row align-items-start justify-content-around text-white">
                                <div class="rounded-circle about-number p-1 mb-2 text-center bg-dark-blue">1</div>
                                <p class="col-12 col-md-8 col-lg-8 about-text mb-2 mt-1">
                                    Usa nuestro buscador para encontrar el servicio que necesitas
                                </p>
                            </div>
                        </div>
                        <div class="col-8 col-sm-3 col-md-3 col-lg-3 p-2 my-2">
                            <div class="row align-items-start justify-content-around text-white">
                                <div class="rounded-circle about-number p-1 mb-2 text-center bg-dark-blue">2</div>
                                <p class="col-12 col-md-8 col-lg-8 about-text mb-2 mt-1">
                                    Selecciona entre todas las opciones del mercado de forma sencilla
                                </p>
                            </div>
                        </div>
                        <div class="col-8 col-sm-3 col-md-3 col-lg-3 p-2 my-2">
                            <div class="row align-items-start justify-content-around text-white">
                                <div class="rounded-circle about-number p-1 mb-2 text-center bg-dark-blue">3</div>
                                <p class="col-12 col-md-8 col-lg-8 about-text mb-2 mt-1">
                                    Solicita los mejores servicios de manera rápida y sencilla
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($errors->any())
            <search-form :errors="{{$errors}}"/>
            @else
            <search-form />
            @endif
        </div>

        <div class="high-companies py-5 px-4">
          <div class="d-flex w-100 align-items-center flex-column">
            <h4 class="high-companies-color high-companies-title text-center">Prestadores de Servicio</h4>
            <companies-slider />
          </div>
        </div>

        <high-plans></high-plans>

</div>
@stop
