@extends('layouts.app')

@section('content')

    <div class="content">
        <div class="ic-bg-main w-100 py-1 px-4" >
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
                    
                <ul class="navbar-nav ml-auto mr-3 ">
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
        </nav>
        <div class="main-section-bg" style="position:relative;">

            <div class="bg-ic">
                
            </div>
            <div style="height:55%; width:100%; background:white;">

            </div>

            <div class="main-middle" >
                <img class="ic-logo-grey" src="{{ asset('images/logo.png') }}" alt="">
                <div class="main-search-form p-3" >
                    <div class="main-form-title-container text-center justify-content-center py-1 px-2">
                        <h6 class="main-form-title font-weight-bold">Encuentra el servicio que deseas</h6>
                    </div>
                </div>
            </div>

        </div>
  </div>

@stop