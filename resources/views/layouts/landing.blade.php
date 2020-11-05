@extends('layouts.app')

@section('content')
    <meta name="description" content=""/>

<meta name="keywords" content="contrata internet, contratar internet, internet hogar,
    internet satelital, internet para hogares, internet wifi, internet banda ancha,
    internet para negocios, internet para empresas, internet empresas, internet fibra optica,
    internet en bogota, internet para pueblos, internetpara mi casa, internet pymes,
    internet business, internet radio, internet economico, internet rapido, el internet
    mas economico de colombia, colombia internet, internet barato, tigo, claro, net2phone,
    telefonia ip, telefonia movil, voz sobre ip, telefonos grandStream, internexa, 
    azteca comunicaciones, HughesNet, ETB, Voip, telefonia en la nube, central virtual">

    <div class="content">
        <div class="ic-bg-main w-100 py-2 px-4" >
            <div class="container  justify-content-end" style="text-align: center;">



            <div style="border:solid 1px;" class="row">
                <div style="border:solid 1px;" class="col-6">

                            <p>correo electronico: contacto@contratainternet.co</p>
                </div>
                <div style="border:solid 1px;" class="col-3">
                            <p>pbx sadas asdasd  asdas</p>

                </div>
                <div style="border:solid 1px;" class="col-3">

                    <div class="row">
                        <div class="col">
                            <p style="color:white">siguenos:</p>

                        </div>
                        <div class="col">
 <!--  <a href=""> <i class="fab fa-facebook-f i-c-main mx-2 text-white text-lg"></i>  </a> -->
 <a href="https://www.facebook.com/colombiainternet/"> <i class="fab fa-facebook-f i-c-main mx-2 text-white text-lg"></i> </a> 
 <a href="https://www.instagram.com/contratainternet.co/?hl=es-la"> <i class="fab fa-instagram i-c-main mx-2 text-white text-lg"></i> </a>  
 <a href="https://www.instagram.com/contratainternet.co/?hl=es-la"> <i class="fab fa-linkedin i-c-main mx-2 text-white text-lg"></i> </a>  

                        </div>
                    </div>
                   
                </div>
            </div>


             
            </div>



        </div>
        <nav class="main-header navbar-light navbar navbar-expand-md mx-auto py-3 px-1">
            <ul  class="navbar-nav ml-3">
                <a class="nav-item" href="/">
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
                <ul class="navbar-nav ml-auto mr-x3 ">

                <li class="nav-item">
                        <a class="nav-link nav-item-border" href="#planes_destacados">
                            <h6 class="ic-main font-weight-bold">
                            Planes Internet
                            </h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-item-border {{Route::current()->uri=='/'?'active':''}}" href="https://contratainternet.co/etb/">
                            <h6 class="ic-main font-weight-bold">
                                Oferta especial del 
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
                    <!-- <li class="nav-item">
                        <a class="nav-link nav-item-border {{strpos(Route::current()->uri,'blog')>-1?'active':''}}" href="/blog">
                            <h6 class="ic-main font-weight-bold">
                                Blog
                            </h6>
                        </a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link nav-item-border {{strpos(Route::current()->uri,'contacto')>-1?'active':''}}" href="/contacto">
                            <h6 class="ic-main font-weight-bold">
                                Contacto
                            </h6>
                        </a>
                    </li>
                   
                </ul>
              </div>

        </nav>




        @yield('content-page')

        <div class="footer-bg">
          <div class="d-flex flex-column align-items-center">
            <div class="mt-3">
              <img src="{{asset('images/LOGO3BLANCO.png')}}" class="footer-img">
            </div>
            <div class="d-flex w-100 footer-links flex-wrap justify-content-bewtween">
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 my-2 footer-link-border">
                <h5 class="footer-title-color font-weight-bold">SERVICIOS DISPONIBLES</h5>
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
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 footer-link-border my-2">
                <h5 class="footer-title-color font-weight-bold">MAPA DE SITIO</h5>
                <ul class="footer-list p-2">
                  <a href="/"><li>-Inicio</li></a>
                  <a href="/nosotros"><li>-Nosotros</li></a>
                  <a href="/contacto"><li>-Contacto</li></a>
                  <a href="https://contratainternet.speedtestcustom.com/"><li>-Prueba de Velocidad</li></a>
                </ul>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 footer-link-border my-2">
                <h5 class="footer-title-color font-weight-bold">PONTE EN CONTACTO</h5>
                <ul class="footer-list p-2">
                  <li>-Correo Electrónico: contacto@contratainternet.co</li>
                  <li>-PBX: +57 (1) 7868510</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="d-flex w-100 justify-content-center align-items-center footer-footer">
          <span class="footer-title-color">Derechos Reservados 2020 - Desarrollado por <a href="">NextScale®</a></span>
        </div>

        <div class="whatsapp">
            <a target="_blank"href="https://api.whatsapp.com/send?phone=573212120281&text=hola, me gustaria saber de los planes"> <img src="{{asset('/images/whatsapp.png')}}" width="67" height="67"> </a>
        </div>
  </div>

@stop
