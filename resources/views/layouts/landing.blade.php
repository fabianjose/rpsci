@extends('layouts.app')

@section('content')
    <meta name="description" content=""/>
<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@200&display=swap" rel="stylesheet">
<meta name="keywords" content="contrata internet, contratar internet, internet hogar,
    internet satelital, internet para hogares, internet wifi, internet banda ancha,
    internet para negocios, internet para empresas, internet empresas, internet fibra optica,
    internet en bogota, internet para pueblos, internetpara mi casa, internet pymes,
    internet business, internet radio, internet economico, internet rapido, el internet
    mas economico de colombia, colombia internet, internet barato, tigo, claro, net2phone,
    telefonia ip, telefonia movil, voz sobre ip, telefonos grandStream, internexa, 
    azteca comunicaciones, HughesNet, ETB, Voip, telefonia en la nube, central virtual">




    <div class="content">
        <div class=" w-100 py-2 px-4" >
            <div class="d-flex justify-content-end" style="color: #606060;">
              <!--  <a href=""> <i class="fab fa-facebook-f i-c-main mx-2 text-white text-lg"></i>  </a> -->

                
                <div style="padding: 5px; border:   1px solid rgb(12,207,244) ; font-family: 'Work Sans', sans-serif; ">Correo Electrónico: contacto@contratainternet.co</div>

                <div  style="padding: 5px;    border: 1px solid rgb(12,207,244); font-family: 'Work Sans', sans-serif;">PBX: +57 123 123 123</div>

                <div  style="padding: 5px;    border: 1px solid rgb(12,207,244); font-family: 'Work Sans', sans-serif;">Siguenos: 
                  <a href="https://www.facebook.com/colombiainternet/" class=" i-c-fab ic-bg-main"> <i  class="fab fa-facebook-f mx-2 ic-bg-main text-md"></i> </a> 
                  <a href="https://www.instagram.com/contratainternet.co/?hl=es-la" class="  i-c-fab ic-bg-main"> <i class="fab fa-instagram  mx-2 ic-bg-main  text-md"></i> </a>
                  <a href="https://www.instagram.com/contratainternet.co/?hl=es-la" class="  i-c-fab ic-bg-main"> <i class="fab fa-linkedin mx-2   text-md"></i> </a>
                </div>

            </div>



        </div>
        <nav class="main-header navbar-light navbar navbar-expand-md mx-auto py-3 px-1 align-items-center" style="background-color:white; height: 80px;">
            <ul  class="navbar-nav ml-3">
                <a class="nav-item" href="/"  style="margin-top: -22px;">
                    <img class="ic-logo" src="{{ asset('images/LOGO5COLORH258.png') }}"  alt="">
                </a>
            </ul>
            <a class="nav-link hidden-md nav-btn ml-auto mx-1 hidden-xl-xl hidden-xl hidden-lg hidden-xs"  href="https://contratainternet.speedtestcustom.com/">
                <i class="fas fa-tachometer-alt"></i>
            </a>
            <a class="nav-link hidden-md nav-btn mx-1 hidden-xl-xl hidden-xl hidden-lg" data-toggle="collapse"
              data-target="#responsive-menu">
                <i class="fas fa-bars"></i>
            </a>
            <div id="responsive-menu" class="navbar-collapse collapse ml-auto mr-0"  style="margin-top: 37px;">
                <ul class="navbar-nav ml-auto mr-x3 " style="margin-top: -30px;">

                <li class="nav-item">
                        <a class="nav-link nav-item-border" href="#planes_destacados">
                            <h6 class="ic-main font-weight-bold">
                            Planes Internet
                            </h6>
                        </a>
                    </li>
                    <li class="nav-item" >
                        <a class="nav-link nav-item-border {{Route::current()->uri=='/'?'active':''}}" href="https://contratainternet.co/etb/">
                            <h6 class="ic-main font-weight-bold">
                                Oferta especial del mes
                            </h6>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link nav-item-border" href="https://contratainternet1.speedtestcustom.com/">
                            <h6 class="ic-main font-weight-bold">
                                Prueba de Velocidad
                            </h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-item-border {{strpos(Route::current()->uri,'nosotros')>-1?'active':''}}" href="/nosotros">
                            <h6 class="ic-main font-weight-bold">
                                Nosotros
                            </h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-item-border {{strpos(Route::current()->uri,'blog')>-1?'active':''}}" href="/blog">
                            <h6 class="ic-main font-weight-bold">
                                Blog
                            </h6>
                        </a>
                    </li>
                   
                </ul>
              </div>

        </nav>

        @yield('content-page')

        <div class="footer-bg">
          <div class="d-flex flex-column align-items-center">
          
            <div class="d-flex w-100 flex-wrap justify-content-bewtween">
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 my-2">
                   <div class="text-center">
              <img src="{{asset('images/fondo_azul_contrata.jpg')}}" class="img-responsive" style="max-width: 100%;">
            </div>
                <ul class="footer-list p-2">
                  <li>-internet satelital
                  </li>

                  <li>-Internet
                  </li>

                  <li>-Telefonia ip
                  </li>

                  <li>-MPLS
                  </li>

                  <li>-Television
                  </li>

                </ul>
              </div>
              <div class="col-xl-8 col-lg-8 col-md-10 col-sm-10 col-12  my-2">
                <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12  my-2">

                <h5 class="footer-title-color font-weight-bold">MAPA DE SITIO</h5>
                <ul class="footer-list p-2">
                  <a href="/"><li>-Inicio</li></a>
                  <a href="/nosotros"><li>-Nosotros</li></a>
                  <a href="/contacto"><li>-Contacto</li></a>
                  <a href="https://contratainternet.speedtestcustom.com/"><li>-Prueba de Velocidad</li></a>
                </ul>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12  my-2">
                  <h5 class="footer-title-color font-weight-bold">PONTE EN CONTACTO</h5>
                  <ul class="footer-list p-2">
                    <li>-Correo Electrónico: contacto@contratainternet.co</li>
                    <li>-PBX: +57 (1) 7868510</li>
                  </ul>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
 

        <div class="whatsapp">
            <a target="_blank"href="https://api.whatsapp.com/send?phone=573212120281&text=hola, me gustaria saber de los planes"> <img src="{{asset('/images/whatsapp.png')}}" width="67" height="67"> </a>
        </div>
  </div>

@stop
