@extends('layouts.content')

@section('title-adminlte', 'Bienvenido al Panel Administrativo!')

@section('content-adminlte')
<div class="container-fluid">
    <div class="row">

          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-primary"><i class="fas fa-suitcase"></i></span>
              <div class="info-box-content">
                <h5 class="info-box-text">Empresas</h5>
                <a href="/companies" class="btn btn-block btn-outline-primary">
                  Gestión  <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fas fa-box"></i></span>
              <div class="info-box-content">
                <h5 class="info-box-text">Servicios</h5>
                <a href="/services" class="btn btn-block btn-outline-success">
                  Gestión  <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fas fa-percent"></i></span>
              <div class="info-box-content">
                <h5 class="info-box-text">Ofertas</h5>
                <a href="/offers" class="btn btn-block btn-outline-danger">
                  Gestión  <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-tag"></i></span>
              <div class="info-box-content">
                <h5 class="info-box-text">Banners Publicitarios</h5>
                <a href="/banners" class="btn btn-block btn-outline-info">
                  Gestión  <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fas fa-tags"></i></span>
              <div class="info-box-content">
                <h5 class="info-box-text">Planes Destacados</h5>
                <a href="/plans" class="btn btn-block btn-outline-warning text-dark">
                  Gestión  <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
          </div>

    </div>
</div>
@stop
