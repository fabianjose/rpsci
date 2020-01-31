<template>
  <div class="card card-primary filter-card">
    <div class="card-body d-flex flex-column align-items-center">
      <h5 class="filter-card-title font-weight-bold text-center">Filtra tu búsqueda</h5>
      <div class="d-flex flex-column w-100 p-2">
        <div class="form-group my-2">
          <label for="orderBy" class="filter-card-label">Ordenar por:</label>
          <select class=" custom-select" id="orderBy">
            <option></option>
          </select>
        </div>
        <div class="my-3">
          <span class="filter-card-label">Rango de precios</span>
          <div class="d-flex w-100">
            <div class="col-6">

            </div>
            <div class="col-6">
              
            </div>
          </div>
        </div>
        <div class="form-group my-2">
          <label for="otherValues" class="filter-card-label">Otros Valores:</label>
          <select class=" custom-select" id="otherValues">
            <option></option>
          </select>
        </div>

      </div>
    </div>
    <div class="card-footer d-flex justify-content-center">
      <div class="col-md-10 col-sm-10">
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
