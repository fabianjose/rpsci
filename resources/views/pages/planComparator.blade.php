@extends("layouts.landing")

@section("content-page")
<div class="planComparator-bg p-5">
  <div class="d-flex flex-column h-100 w-100 flex-wrap">
    <div class="col-xl-3 col-lg-4 col-md-5 col-12">
      <filter-card>
    </div>
    <div class="col-xl-9 col-lg-8 col-md-7 col-12">
      <div class="d-flex flex-column w-100">
        <div class="d-flex w-100 justify-content-center">
          <div class="btn btn-dark-blue rounded-pill col-2 mx-1">
            <span class="text-sm">PROVEEDOR</span>
          </div>
          <div class="btn btn-dark-blue rounded-pill col-2 mx-1">
            <span class="text-sm">BENEFICIOS</span>
          </div>
          <div class="btn btn-dark-blue rounded-pill col-2 mx-1">
            <span class="text-sm">CAMPO 1</span>
          </div>
          <div class="btn btn-dark-blue rounded-pill col-2 mx-1">
            <span class="text-sm">CAMPO 2</span>
          </div>
          <div class="btn btn-dark-blue rounded-pill col-2 mx-1">
            <span class="text-sm">DETALLES</span>
          </div>
        </div>
        <?php for ($i=0; $i < 3; $i++) { ?>
          <div class="d-flex w-100 justify-content-center my-4 offer">
            <div class="col-2 mx-1 text-center align-middle">
              <span class="align-center">NEXTSCALE</span>
            </div>
            <div class="col-2 mx-1 text-center align-middle">
              <span class="text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span>
            </div>
            <div class="col-2 mx-1 text-center align-middle">
              <span class="">VALOR</span>
            </div>
            <div class="col-2 mx-1 text-center align-middle">
              <span class="">VALOR</span>
            </div>
            <div class="col-2 mx-1 text-center align-middle">
              <button type="button" class="btn btn-primary rounded-pill">Consultar</button>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
@stop
