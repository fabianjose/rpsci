@extends("layouts.landing")

@section("content-page")
<div class="planComparator-bg px-4 py-4">
  <div class="d-flex flex-column h-100 w-100 align-items-center">
    <div class="col-xl-6 col-lg-6 col-md-6 col-12 mb-5">
      <filter-card>
    </div>
    <div class="col-12">
      <div class="d-flex flex-column w-100">
        <div class="d-flex w-100 justify-content-center">
          <div class="btn btn-dark-blue rounded-pill col-xl-2 col-lg-2 col-md-3 mx-1">
            <span class="text-sm">PROVEEDOR</span>
          </div>
          <div class="btn btn-dark-blue rounded-pill col-xl-2 col-lg-2  mx-1 offer-benefits">
            <span class="text-sm">BENEFICIOS</span>
          </div>
          <div class="btn btn-dark-blue rounded-pill col-xl-2 col-lg-2 col-md-3 mx-1">
            <span class="text-sm">CAMPO 1</span>
          </div>
          <div class="btn btn-dark-blue rounded-pill col-xl-2 col-lg-2 col-md-3 mx-1">
            <span class="text-sm">CAMPO 2</span>
          </div>
          <div class="btn btn-dark-blue rounded-pill col-xl-2 col-lg-2 col-md-3 mx-1">
            <span class="text-sm">DETALLES</span>
          </div>
        </div>
        <?php for ($i=0; $i < 4; $i++) { ?>
          <div class="d-flex w-100 justify-content-center my-4 offer offers-pagination-item">
            <div class="col-xl-2 col-lg-2 col-md-3 mx-1 text-center d-flex align-items-center justify-content-center">
              <img src="{{asset('images/logo.png')}}" class="offer-company">
            </div>
            <div class="col-xl-2 col-lg-2 mx-1 text-center d-flex align-items-center justify-content-center offer-benefits">
              <span class="text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-3 mx-1 text-center d-flex align-items-center justify-content-center">
              <span class="">VALOR</span>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-3 mx-1 text-center d-flex align-items-center justify-content-center">
              <span class="">VALOR</span>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-3 mx-1 text-center d-flex align-items-center justify-content-center">
              <button type="button" class="btn btn-primary rounded-pill">Consultar</button>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
@stop
