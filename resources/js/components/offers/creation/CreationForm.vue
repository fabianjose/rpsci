<template>
    <div class="card card-info" id="createOfferAccordion">
      <a class="card-header collapsed" @click="active=!active" data-parent="#createOfferAccordion" href="#collapseOne" aria-expanded="false" data-toggle="collapse">
        <h3 class="card-title">Nueva Oferta</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool ml-auto " >
            <personal-fab :active="active" />
          </button>
        </div>
      </a>

      <div id="collapseOne" class="panel-collapse in collapse" >
        <div class="card-body">
          <div class="d-flex w-100 flex-wrap">
            <div class="form-group col-xl-6 col-lg-6 col-md-6 col-6">
              <label>Empresa</label>
              <autocomplete-vue
              v-model="company"
              url="/api/companies"
              requestType="get"
              placeholder="Empresa"
              property="name"
              :required="true"
              :threshold="1"
              inputClass="form-control"
              value="id"
              @selected="selectCosa"
              ></autocomplete-vue>
            </div>
            <div class="form-group col-xl-6 col-lg-6 col-md-6 col-6">
              <label>Servicio</label>
              <select class="custom-select" v-model="service">
                <option :value="service.id" v-for="service in services"  :key="service.id">{{service.name}}</option>
              </select>
            </div>
          </div>
          <div class="d-flex w-100 flex-wrap">
            <div class="form-group col-12">
              <label>Beneficios</label>
              <textarea class="form-control" rows="3" placeholder="Beneficios..." v-model="benefits" style="resize: none;"></textarea>
            </div>
          </div>
          <div class="d-flex w-100 flex-wrap">
            <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
              <label>Departamento</label>
              <autocomplete-vue
              v-model="department"
              url="/api/departments"
              requestType="get"
              placeholder="Departamento"
              property="name"
              :required="true"
              :threshold="1"
              inputClass="form-control"
              ></autocomplete-vue>
            </div>
            <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
              <label>Municipio</label>
              <autocomplete-vue
              v-model="municipality"
              url="/api/municipalities"
              requestType="get"
              placeholder="Municipio"
              property="name"
              :required="true"
              :threshold="1"
              inputClass="form-control"
              ></autocomplete-vue>
            </div>
          </div>
          <div class="d-flex w-100 flex-wrap">
            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-6">
              <label>Tarifa</label>
              <input v-model="tariff" class="form-control">
            </div>
            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-6">
              <label>Tipo</label>
              <select class="custom-select" v-model="type">
                <option value="private">Particular</option>
                <option value="company">Empresa</option>
              </select>
            </div>
            <div class="form-group col-xl-4 col-lg-4 col-md-6 col-6">
              <label>Puntuacion (Opcional)</label>
              <select class="custom-select" v-model="points">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
            </div>
          </div>
        </div>

        <div class="card-footer">
          <button type="button" class="btn btn-outline-success" @click="createOffer">Agregar</button>
        </div>
      </div>
    </div>
</template>

<script>
export default {
  data(){
    return {
      active:false,
      company: "",
      department: "",
      municipality: "",
      type: "private",
      tariff: "",
      benefits: "",
      services: [],
      service: null,
      points: null,
      fields_value: "json vergatario"
    }
  },

  mounted(){
    axios.get(baseUrl+'/api/services')
    .then(res=>{
      // console.log(res);
      this.services = res.data;
    }).catch(err=>{
      console.log(err.response);
    });
  },
  methods:{
    selectCosa(value){
      console.log('here we go');
      console.log(value);
    },
    createOffer(){
      let fd= new FormData();
      fd.append("company", this.company);
      fd.append("department", this.department);
      fd.append("municipality", this.municipality);
      fd.append("type", this.type);
      fd.append("tariff", this.tariff);
      fd.append("benefits", this.benefits);
      fd.append("service", this.service);
      fd.append("points", this.points);
      fd.append("fields_value", JSON.stringify(this.fields_value));

      axios.post(baseUrl+'/api/offer',fd)
      .then(res=>{
        console.log("RESPONSE FROM SERVER ",res);
        toastr.success("Oferta creada con éxito");
      })
      .catch(err=>{
        console.log("ERROR FROM SERVER ",err,err.response);
        for (var error in err.response.data) {
          toastr.error(error);
          // for (var message in error) {
          // }
        }
        toastr.error("Error al crear la oferta");
      });
    }
  }
}

</script>
