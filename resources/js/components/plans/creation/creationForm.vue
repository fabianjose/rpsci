<template>
    <div class="card card-info" id="createOfferAccordion">
      <a class="card-header collapsed" @click="active=!active" data-parent="#createOfferAccordion" href="#collapseOne" aria-expanded="false" data-toggle="collapse">
        <h3 class="card-title">Destacar Oferta</h3>
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
              ></autocomplete-vue>
            </div>

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

          <div class="row my-3 px-4">
            <button type="button" class="btn btn-outline-success" @click="highlightedOffers">Buscar ofertas</button>
          </div>

        <div class="card card-primary" id="OffersAccordion">
            <a class="card-header collapsed" @click="active2=!active2" data-parent="#OffersAccordion"
                href="#OffersList" aria-expanded="false" data-toggle="collapse">
                <h3 class="card-title">Seleccione una oferta</h3>
                <div class="card-tools">
                <button type="button" class="btn btn-tool ml-auto " >
                    <personal-fab :active="active2" />
                </button>
                </div>
            </a>

            <div id="OffersList" class="panel-collapse in collapse" >
                <div class="card-body">

                    <div class="d-flex flex-row justify-content-around w-100 flex-wrap">
                      <offer class="col-md-6 col-lg-4 col-sm-8" v-for="(offer,k) in offersByArea" :key="k"
                        :title="offer.service_name" :logo="offer.company_logo" :index="k"
                        :company="offer.company_name" :pick="true"
                        @pick="selectOffer" @view="viewModal"
                      ></offer>
                    </div>

                </div>
              </div>
          </div>

          <div class="card card-success" id="SelectedOfferAccordion">
            <a class="card-header collapsed" @click="active3=!active3" data-parent="#SelectedOfferAccordion"
                href="#SelectedOffer" aria-expanded="false" data-toggle="collapse">
                <h3 class="card-title">Oferta Seleccionada</h3>
                <div class="card-tools">
                <button type="button" class="btn btn-tool ml-auto " >
                    <personal-fab :active="active3" />
                </button>
                </div>
            </a>

            <div id="SelectedOffer" class="panel-collapse in collapse" >
                <div class="card-body">

                  <div v-if="selectedOffer" class="d-flex flex-row justify-content-around w-100 wlex-wrap">
                    <offer class="col-md-6 col-lg-4 col-sm-8" v-if="selectedOffer" :title="selectedOffer.service_name"
                      :logo="selectedOffer.company_logo" :company="selectedOffer.company_name" :remove="true"
                      @delete="selectedOffer=null;" @view="viewSelected"
                    ></offer>
                  </div>

                  <div v-if="selectedOffer" class="col-8 form-group px-4">

                    <label>Fecha de expiracion</label>
                    <!-- <input type="text" class="form-control" placeholder="YYYY/MM/DD" v-model="expiration"> -->

                    <datetimepicker format="YYYY-MM-DD H:i:s" v-model="expiration"></datetimepicker>

                  </div>


                </div>
              </div>
          </div>

        </div>


        <div class="card-footer">
          <button type="button" class="btn btn-outline-success" @click="highlightOffer">Destacar</button>
        </div>
      </div>
    </div>
</template>

<script>
export default {
  props: ['services'],
  data(){
    return {
      active:false,
      active2:false,
      active3:false,
      company: "",
      department: "",
      municipality: "",
      selectedOffer:null,
      offersByArea:[],
      expiration:null,
    }
  },
  mounted(){
  },
  methods:{
    OpenAccordion(parentId,childId,activeIndex){
      if(!$(parentId).hasClass("collapsed")) $(parentId).addClass("collapsed");
      else return;
      if(!$(childId).hasClass("show")) $(childId).addClass("show");
      else return;
      this[activeIndex]= !this[activeIndex];
    },
    highlightOffer(){
      let fd= new FormData();
      if(this.expiration) fd.append("highlighted_expiration", this.expiration.split);
      else return toastr.error("Debe introducir una fecha de expiración");

      axios.post(baseUrl+'/api/offers/highlight/'+this.selectedOffer.id,fd)
      .then(res=>{
        console.log("RESPONSE FROM SERVER ",res);
        toastr.success("Oferta Destacada con éxito");
        this.$emit('refresh');
      }).catch(err=>{
        console.log("ERROR FROM SERVER ",err.response);
        if (err.response.data.errorMessage){
          toastr.error(err.response.data.errorMessage);
        }else {
          let allErrors = err.response.data;
          for (var errorkey in allErrors) {
            if (allErrors[errorkey]){
              for (var error of allErrors[errorkey]) {
                toastr.error(error);
              }
            }
          }
        }
      });
    },
    selectOffer(index){
      this.selectedOffer=this.offersByArea[index];
      this.OpenAccordion("#SelectedOfferAccordion","#SelectedOffer", "active3");
    },
    viewModal(index){
      this.$emit("viewOffer", this.offersByArea[index]);
    },
    viewSelected(){
      this.$emit("viewOffer", this.selectedOffer);
    },
    highlightedOffers(){
      this.OpenAccordion("#OffersAccordion","#OffersList", "active2");
      let fd= new FormData();
      console.log("items:")
      console.log(this.company, this.municipality, this.department);
      console.log(typeof this.company, typeof this.municipality, typeof this.department);

      if(this.company) fd.append("company", this.company);
      else return;

      if(this.department) fd.append("department", this.department);
      else return;

      if(this.municipality) fd.append("municipality", this.municipality);
      else return;

      axios.post(baseUrl+'/api/offers/area',fd)
      .then(res=>{
        console.log("RESPONSE FROM SERVER ",res);
        this.offersByArea=res.data;
      }).catch(err=>{
        console.log("ERROR FROM SERVER ",err.response);
        if (err.response.data.errorMessage){
          toastr.error(err.response.data.errorMessage);
        }else {
          let allErrors = err.response.data;
          for (var errorkey in allErrors) {
            if (allErrors[errorkey]){
              for (var error of allErrors[errorkey]) {
                toastr.error(error);
              }
            }
          }
        }
        toastr.error("Error al cargar las ofertas del área");
      });
    }
  }
}
</script>
