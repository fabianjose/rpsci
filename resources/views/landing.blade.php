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

            <search-form/>

        </div>

        <div class="high-companies py-5 px-4">
          <div class="d-flex w-100 align-items-center flex-column">
            <h4 class="high-companies-color high-companies-title text-center">Prestadores de Servicio</h4>
              <companiesSlider />  
          </div>
        </div>

        <div class="high-plans py-5 px-4">
          <div class="d-flex w-100 justify-content-center mt-3">
            <h4 class="high-plans-color high-plans-title">Planes destacados</h4>
          </div>
          <div class="d-flex w-100 justify-content-center mt-5">
            <vueper-slides
              class="no-shadow high-plans-carousel"
              :bullets="false"
              :visible-slides="3"
              :slide-ratio="1 / 3"
              :dragging-distance="70"
              :breakpoints="{
                1200: {
                  visibleSlides:3,
                  slideRatio:1 / 3
                },
                900: {
                  visibleSlides:2,
                  slideRatio:1 / 2.5
                },
                750: {
                  visibleSlides:2,
                  slideRatio:1 / 2,
                },
                600: {
                  visibleSlides: 2,
                  slideRatio:1 / 1.5
                },
                520: {
                  visibleSlides: 1,
                  slideRatio:1,
                },
                380: {
                  visibleSlides:1,
                  slideRatio:1,
                  arrows: false
                }}">
              <vueper-slide v-for="i in 9" :key="i" :title="i.toString()">
                <template v-slot:content>
                  <div class="h-100 bg-dark mx-2">

                  </div>
                </template>
              </vueper-slide>
            </vueper-slides>
          </div>

          <div class="offer-card rounded-pill">

          </div>

        </div>

</div>
@stop
