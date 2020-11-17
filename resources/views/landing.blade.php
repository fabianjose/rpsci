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
                <div class="d-flex flex-column about-sub p-3" style="padding-left: 100px;
    padding-right: 100px;">
                    <div class="d-flex flex-row flex-wrap justify-content-center  text-heebo"  style="    margin-top: -50px; padding-left: 100px;
    padding-right: 100px;">
                        <div class="col-8 col-sm-3 col-md-3 col-lg-3 p-2 my-2">
                            <div class="row align-items-start justify-content-center text-white">
                                <div class="rounded-circle about-number p-1 mb-1 text-center bg-dark-blue">1</div>
                                <p class="btn" class="col-12 col-md-8 col-lg-8 about-text  mt-1" style="font-size:11px; background-color:#565656; color:white" >
                                   Selecciona Hogar,Empresa,Isp o Pyme
                                </p>
                            </div>
                        </div>
                        <div class="col-8 col-sm-3 col-md-3 col-lg-3 p-2 my-2">
                            <div class="row align-items-start justify-content-center text-white">
                                <div class="rounded-circle about-number p-1 mb-1 text-center bg-dark-blue">2</div>
                                <p class="btn" class="col-12 col-md-8 col-lg-8 about-text mt-1" style="font-size:11px; background-color:#565656; color:white" >
                                    Seleccione el tipo de servicio
                                </p>
                            </div>
                        </div>
                        <div class="col-8 col-sm-3 col-md-3 col-lg-3 p-2 my-2">
                            <div class="row align-items-start justify-content-center text-white">
                                <div class="rounded-circle about-number p-1 mb-1 text-center bg-dark-blue">3</div>
                                <p class="btn" class="col-12 col-md-8 col-lg-8 about-text mt-1" style="font-size:11px; background-color:#565656; color:white" >
                                   Selecciona Departamento y Municipìo
                                </p>
                            </div>
                        </div>
                        <div class="col-8 col-sm-3 col-md-3 col-lg-3 p-2 my-2">
                            <div class="row align-items-start justify-content-center text-white">
                                <div class="rounded-circle about-number p-1 mb-1 text-center bg-dark-blue">4</div>
                                <p class="btn" class="col-12 col-md-8 col-lg-8 about-text  mt-1" style="font-size:11px; background-color:#565656; color:white"  >
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
            <section class="section-search mb-3" style="min-height: 500px; padding-top: 15%;margin-top: -8%;">
                <div class="row justify-content-center">
                    <div class="col-3 text-right text-ws" style="font-weight: 600;color: #184156;margin-top: auto;font-size: 1.25rem;
margin-bottom: auto;">
                        ¡Pulsa el Botón y <br> Encuentra
                    </div>
                    <div class="col-2 text-center " >
                        <a class="btn-rounded">

                        <img  src="{{ asset('images/button_contrata_internet.jpg') }}" style="max-width: 100%;">
                        </a>
                    </div>
                    <div class="col-3 text-left text-ws" style="font-weight: 600;color: #184156;margin-top: auto;font-size: 1.25rem;
margin-bottom: auto;" >
                        el proveedor <br> recomendado!
                    </div>
                </div>
                <div class=" justify-content-center container p-3" id="planes-destacados" >
                 <high-plans></high-plans>
             </div>
            </section>
            <section class="section-form" style="background: rgb(0,194,214);min-height: 400px;padding-top: 15%;  border-radius: 27% 27% 0 0px;margin-top: -15%;">
                       
                    <div class="row  justify-content-center  pb-5  " style="align-items: center;">
                        <div class="col-12 col-sm-3 text-center">
                            <h5 class="text-white text-ws" style="font-weight: bold; font-size:25px ">Resolvemos todas tus <br> dudas en una llamada</h5>
                            <h2 class="text-white text-ws" style="font-weight: bold;font-size:30px ">¡Contáctanos!</h2>
                        </div>

                        <div class="col-12 col-sm-4 px-3">
                             <input id="text-form" class="form-control mt-1  p-2"  type="text" name="" placeholder="Nombre"/>
                             <input id="text-form"  class="form-control  mt-1 p-2" type="text" name="" placeholder="Celular"/>
                             <input id="text-form"  class="form-control  mt-1 p-2" type="text" name="" placeholder="Email"/>
                        </div>
                        <div class="col-12 col-sm-3">
                            <button id="btn-enviar" class="btn text-white" style="background: rgb(13,217,244);font-size: 25px;">ENVIAR</button>
                        </div>
                    </div>

                
            </section>

            <div class="bg-ic d-flex flex-row justify-content-around flex-wrap align-items-center">
                <config-counters :counters="{{json_encode($configs)}}" class="col-10 col-sm-10 col-md-7 col-lg-7 col-xl-7"></config-counters>
            </div>
            <section class="section-blog" style="padding-top: 3rem;">
                <h1 class="text-center text-ws" style="font-weight: 800;">Nuestras Publicaciones de Blog</h1>
                
            </section>
        </div>
     
       

</div>
@stop



