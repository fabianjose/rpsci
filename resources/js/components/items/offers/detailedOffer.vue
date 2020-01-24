<template>
  <div class="modal fade" id="modalViewOffer" aria-modal="true" style="padding-right: 15px; display: block;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info text-white">
          <h4 class="modal-title">Detalle de Oferta</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="card-body d-flex flex-column box-profile">

          <img class="img-fluid" :src="baseUrl+'/storage/'+offer.company_logo" alt="Offer picture">

          <h2 class="profile-username text-center">{{offer.service_name}}</h2>

          <h3 class="profile-username text-center">{{offer.company_name}}</h3>

          <p class="text-muted text-center">{{offer.benefits}}</p>

          <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
              <b>Tarifa</b> <a class="float-right">{{offer.tariff}}</a>
            </li>
            <li class="list-group-item">
              <b>Departamento</b> <a class="float-right">{{offer.department_name}}</a>
            </li>
            <li class="list-group-item">
              <b>Municipio</b> <a class="float-right">{{offer.municipality_name}}</a>
            </li>
          </ul>

          <button href="#" class="btn btn-outline-danger btn-block" data-dismiss="modal"><b>Cerrar</b></button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props:["offer"],
  data(){
    return {
      baseUrl: baseUrl,
    }
  },
}
</script>
