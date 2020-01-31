@extends('layouts.app')

@section('content')

    <div class="content">
        <div class="ic-bg-main w-100 py-2 px-4" >
            <div class="container d-flex justify-content-end">
                <i class="fab fa-facebook-f i-c-main mx-2 text-white text-lg"></i>
                <i class="fab fa-twitter i-c-main mx-2 text-white text-lg"></i>
                <i class="fab fa-instagram i-c-main mx-2 text-white text-lg"></i>
            </div>
        </div>
        <nav class="main-header navbar-light navbar navbar-expand-md navbar-expand-sm mx-auto py-3 px-4">
            <ul class="navbar-nav ml-3">
                <li class="nav-item">
                    <img class="ic-logo" src="{{ asset('images/logo.png') }}" alt="">
                </li>
            </ul>
            <a class="nav-link hidden-sm nav-btn" data-toggle="collapse" data-target="#responsive-menu"><i class="fas fa-bars"></i></a>
            <div id="responsive-menu" class="navbar-collapse collapse">
                <ul class="navbar-nav ml-auto mr-x3 ">
                    <li class="nav-item">
                        <a class="nav-link nav-item-border active" href="#">
                            <h6 class="ic-main font-weight-bold">
                                Inicio
                            </h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-item-border" href="#">
                            <h6 class="ic-main font-weight-bold">
                                Nosotros
                            </h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-item-border" href="#">
                            <h6 class="ic-main font-weight-bold">
                                Blog
                            </h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-item-border" href="#">
                            <h6 class="ic-main font-weight-bold">
                                Contacto
                            </h6>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
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
                                <p class="col-8 about-text mb-2 mt-1">
                                    Usa nuestro buscador para encontrar el servicio que necesitas
                                </p>
                            </div>
                        </div>
                        <div class="col-8 col-sm-3 col-md-3 col-lg-3 p-2 my-2">
                            <div class="row align-items-start justify-content-around text-white">
                                <div class="rounded-circle about-number p-1 mb-2 text-center bg-dark-blue">2</div> 
                                <p class="col-8 about-text mb-2 mt-1">
                                    Selecciona entre todas las opciones del mercado de forma sencilla
                                </p>
                            </div>
                        </div>
                        <div class="col-8 col-sm-3 col-md-3 col-lg-3 p-2 my-2">
                            <div class="row align-items-start justify-content-around text-white">
                                <div class="rounded-circle about-number p-1 mb-2 text-center bg-dark-blue">3</div> 
                                <p class="col-8 about-text mb-2 mt-1">
                                    Solicita los mejores servicios de manera rápida y sencilla
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="main-middle" >
                <img class="ic-logo-grey my-2" src="{{ asset('images/logo-blanco.png') }}" alt="">
                <div class="main-search-form p-3" >
                    <div class="main-form-title-container text-center justify-content-center pt-2 py-1 px-3">
                        <h6 class="main-form-title font-weight-bold text-center">Encuentra el servicio que deseas</h6>
                    </div>
                    <div class="d-flex flex-row flex-wrap justify-content-around p-3">
                        <div class="form-group has-search col-md-6 col-sm-10 col-lg-4">
                            <span class="fas fa-map-marker-alt form-control-feedback "></span>
                            <input type="text" class="form-control rounded-pill" placeholder="Departamento">
                        </div>
                        <div class="form-group has-search col-md-6 col-sm-10 col-lg-4">
                            <span class="fa fa-city form-control-feedback "></span>
                            <input type="text" class="form-control rounded-pill" placeholder="Municipio">
                        </div>
                        <div class="form-group has-search col-md-6 col-sm-10 col-lg-4">
                            <span class="fa fa-tv form-control-feedback "></span>
                            <input type="text" class="form-control rounded-pill" placeholder="Servicio">
                        </div>
                        <div class="col-md-6 col-sm-10">
                            <i class="fa fa-search icon-btn"></i>
                            <button class="btn btn-block btn-dark-blue rounded-pill">
                                Buscar
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="high-companies py-5 px-4">
          <div class="d-flex w-100 justify-content-center">
            <h4 class="high-companies-color high-companies-title text-center">Prestadores de Servicio</h4>
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
              :slide-ratio="1 / 4"
              :dragging-distance="70">
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

        <div class="footer-bg">
          <div class="d-flex flex-column align-items-center">
            <div class="mt-3">
              <img src="{{asset('images/logo-gris.png')}}" class="footer-img">
            </div>
            <div class="d-flex w-100 footer-links flex-wrap justify-content-center">
              <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                <h5 class="footer-title-color font-weight-bold">SERVICIOS DISPONIBLES</h5>
                <ul class="footer-list p-2">
                  <li>-Item 1</li>
                  <li>-Item 2</li>
                  <li>-Item 3</li>
                  <li>-Item 4</li>
                </ul>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-6 col-12 footer-link-border">
                <h5 class="footer-title-color font-weight-bold">CATEGORÍAS DEL BLOG</h5>
                <ul class="footer-list p-2">
                  <li>-Item 1</li>
                  <li>-Item 2</li>
                  <li>-Item 3</li>
                  <li>-Item 4</li>
                </ul>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-6 col-12 footer-link-border">
                <h5 class="footer-title-color font-weight-bold">PONTE EN CONTACTO</h5>
                <ul class="footer-list p-2">
                  <li>-Correo Electronico</li>
                  <li>-Números de teléfono</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="d-flex w-100 justify-content-center align-items-center footer-footer">
          <span class="footer-title-color">Derechos Reservados 2020 - Desarrollado por NextScale®</span>
        </div>
  </div>

@stop
