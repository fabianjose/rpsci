@extends("layouts.landing")

@section("content-page")
<div>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{asset('images/main-bg.png')}}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{asset('images/main-bg.png')}}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{asset('images/main-bg.png')}}" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


        <div class="main-section-bg" style="position:relative;background: transparent;margin-top:-15%;" >

            
            <div class="about-section" style="background: transparent;">
                <div class="d-flex flex-column about-sub py-5 p-3" style="padding-left: 70px;
    padding-right: 70px;">
                    <div class="d-flex flex-row flex-wrap justify-content-center py-3"  style="    margin-top: -50px; padding-left: 70px;
    padding-right: 70px;">
                        <div class="col-8 col-sm-3 col-md-3 col-lg-3 p-2 my-2">
                            <div class="row align-items-start justify-content-center text-white">
                                <div class="rounded-circle about-number p-1 mb-2 text-center bg-dark-blue">1</div>
                                <p class="col-12 col-md-8 col-lg-8 about-text mb-2 mt-1  bg-dark" >
                                   Selecciona Hogar o Empresa
                                </p>
                            </div>
                        </div>
                        <div class="col-8 col-sm-3 col-md-3 col-lg-3 p-2 my-2">
                            <div class="row align-items-start justify-content-center text-white">
                                <div class="rounded-circle about-number p-1 mb-2 text-center bg-dark-blue">2</div>
                                <p class="col-12 col-md-8 col-lg-8 about-text mb-2 mt-1  bg-dark">
                                    Seleccione el tipo de servicio
                                </p>
                            </div>
                        </div>
                        <div class="col-8 col-sm-3 col-md-3 col-lg-3 p-2 my-2">
                            <div class="row align-items-start justify-content-center text-white">
                                <div class="rounded-circle about-number p-1 mb-2 text-center bg-dark-blue">3</div>
                                <p class="col-12 col-md-8 col-lg-8 about-text mb-2 mt-1  bg-dark">
                                   Selecciona Departamento y Municipìo
                                </p>
                            </div>
                        </div>
                        <div class="col-8 col-sm-3 col-md-3 col-lg-3 p-2 my-2">
                            <div class="row align-items-start justify-content-center text-white">
                                <div class="rounded-circle about-number p-1 mb-2 text-center bg-dark-blue">4</div>
                                <p class="col-12 col-md-8 col-lg-8 about-text mb-2 mt-1  bg-dark">
                                   Encuentra la Mejor Opción
                                </p>
                            </div>
                        </div>
                    </div>                
                    @if ($errors->any())
                    <search-form :errors="{{$errors}}"/>
                    @else
                    <search-form />
                    @endif
                </div>
            </div>
            <section class="section-search" style="min-height: 400px; ">
                <div class="row justify-content-center">
                    <div class="col-3 text-right">
                        ¡Pulsa el Botón y Encuentra
                    </div>
                    <div class="col-1 text-center" >
                        <button class="btn-rounded">Hola</button>
                    </div>
                    <div class="col-3 text-left btn">
                        el proveedor recomendado!
                    </div>
                </div>
                <div class="row justify-content-center container" id="planes-destacados">
                 <high-plans></high-plans>
             </div>
            </section>
            <section class="section-form" style="background: rgb(0,194,214);min-height: 400px;padding-top: 27%;  border-radius: 27% 27% 0 0px;">

                    <div class="row container justify-content-center">
                        <div class="col-4">
                            <h2 class="text-white">Resolvemos todo con una llamada</h2>
                        </div>
                        <div class="col-5">
                            <input  type="" name=""/>
                             <input type="" name=""/>
                              <input type="" name=""/>
                        </div>
                        <div class="col-3">
                            <button class="btn text-white">ENVIAR</button>
                        </div>
                    </div>
                
                
            </section>

            <div class="bg-ic d-flex flex-row justify-content-around flex-wrap align-items-center">
                <config-counters :counters="{{json_encode($configs)}}" class="col-10 col-sm-10 col-md-7 col-lg-7 col-xl-7"></config-counters>
            </div>
            <section class="section-blog">
                <h1 class="text-center">Nuestras Publicaciones de Blog</h1>
                
            </section>
        </div>



        <!--div class="high-companies pt-4 pb-5 px-4">
          <div class="d-flex w-100 align-items-center flex-column">
            <h4 class="high-companies-color high-companies-title text-center">Prestadores de Servicio</h4>
            <companies-slider />
          </div>
        </div-->
     
       

</div>
@stop
