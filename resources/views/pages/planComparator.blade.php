@extends("layouts.landing")

@section("content-page")
<div class="planComparator-bg px-4 py-4">
  <div class="d-flex flex-row h-100 w-100 flex-wrap justify-content-around align-items-center">
    <div class="col-12 col-lg-4 col-xl-4">
      <filter-card>
    </div>
    <div class="col-12 col-lg-8 col-xl-8">
      <div class="d-flex flex-column w-100">
        <div class="d-flex flex-row w-100 justify-content-around mb-2">
          <div class="col-xl-2 col-lg-3 col-md-4">
            <button class="btn btn-block text-sm offers-label mx-auto btn-dark-blue rounded-pill ">
              PROVEEDOR
            </button>
          </div>
          <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 hidden-xs hidden-sm">
            <button class="btn btn-block text-sm offers-label mx-auto btn-dark-blue rounded-pill ">
              BENEFICIOS
            </button>
          </div>

          <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 offer-benefits hidden-md hidden-xs hidden-sm">
            <button class="btn btn-block text-sm offers-label mx-auto btn-dark-blue rounded-pill ">
              CAMPO 1
            </button>
          </div>

          <div class="col-xl-2 offer-benefits hidden-lg hidden-md hidden-xs hidden-sm">
            <button class="btn btn-block text-sm offers-label mx-auto btn-dark-blue rounded-pill ">
              CAMPO 2
            </button>
          </div>

          <div class="col-xl-2 col-lg-3 col-md-4">
            <button class="btn btn-block text-sm offers-label mx-auto btn-dark-blue rounded-pill">
              DETALLES
            </button>
          </div> 
        </div>
        <?php for ($i=0; $i < 4; $i++) { ?>
          <div class="d-flex w-100 justify-content-around my-1 mb-3 offer offers-pagination-item pb-3">
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6 d-flex flex-column align-items-center justify-content-center">
              <img src="{{asset('images/logo.png')}}" class="w-100 p-2">
            </div>
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 text-center flex-column align-items-center justify-content-center d-xl-flex d-lg-flex d-md-flex hidden-xs hidden-sm">
              <h6 class="text-lg">
                beneficios extendidos
              </h6>
            </div>
            <div class="col-xl-2 col-lg-3 text-center flex-column align-items-center justify-content-center d-xl-flex d-lg-flex hidden-md hidden-xs hidden-sm">
              <h6 class="text-lg">
                Campo 1
              </h6>
            </div>
            <div class="col-xl-2 col-lg-3 text-center flex-column align-items-center justify-content-center d-xl-flex hidden-lg hidden-md hidden-xs hidden-sm">
              <h6 class="text-lg">
                Campo 2
              </h6>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6 py-2 text-center d-flex flex-column align-items-center justify-content-center">
              <h6 class="text-dark-blue text-lg">100000$</h6>
              <div class="stars-container flex-row justify-content-center mb-2">
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
              </div>
              <div class="d-flex flex-row">
                <button type="button" class="btn btn-sm btn-main-blue rounded-pill mx-1">Consultar</button>
                <button type="button" class="btn btn-sm btn-main-pink rounded-pill mx-1 hidden-xl"><i class="fas fa-eye"></i></button>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
@stop
