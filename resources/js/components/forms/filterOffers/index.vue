<template>
  <div class="card card-primary filter-card">
    <div class="card-body d-flex flex-column align-items-center pt-4">
      <h5 class="filter-card-title font-weight-bold text-center">Filtra tu búsqueda</h5>
      <div class="d-flex flex-column w-100 py-3 px-1">
        <div class="form-group my-2">
          <label for="orderBy" class="filter-card-label">Ordenar por:</label>
          <select class="custom-select rounded-pill" id="orderBy">
            <option></option>
          </select>
        </div>
        <div class="my-3">
          <span class="filter-card-label">Rango de precios</span>
          <div class="d-flex w-100 py-3 flex-wrap justify-content-center">
            <div class="col-md-6 col-sm-6 col-12 d-flex align-items-center justify-content-center">
              <span class="text-muted text-sm">Desde</span>
              <select class="custom-select rounded-pill ml-3" style="max-width:100px;">
                <option></option>
              </select>
            </div>
            <div class="col-md-6 col-sm-6 col-12 d-flex align-items-center justify-content-center">
              <span class="text-muted text-sm">Hasta</span>
              <select class="custom-select rounded-pill ml-3" style="max-width:100px;">
                <option></option>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group my-2">
          <label for="otherValues" class="filter-card-label">Otros Valores:</label>
          <select class="custom-select rounded-pill" id="otherValues">
            <option></option>
          </select>
        </div>

      </div>
    </div>
    <div class="card-footer d-flex justify-content-center pt-2 pb-5">
      <div class="col-lg-8 col-md-10 col-sm-10">
        <i class="fa fa-search icon-btn"></i>
        <button class="btn btn-block btn-dark-blue rounded-pill">
          Buscar
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
}
</script>
