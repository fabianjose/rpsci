<template>
<div class="container-fluid">
    <div class="row justify-content-center py-4">
        <div class="col-10 col-lg-12">
            <plans-creation @viewOffer="viewSelected" @refresh="refreshData"></plans-creation>
        </div>
    </div>
    <h5 class="mt-4 mb-2 text-center">Ofertas Disponibles</h5>
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Busqueda Avanzada</h3>
        </div>
        <div class="card-body">
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

          <div class="row my-3 px-4">
            <button type="button" class="btn btn-lg btn-outline-success" @click="refreshData">Buscar ofertas por municipio</button>
          </div>
        </div>
      </div>
    <div class="row justify-content-space-around py-4">
      <offer v-for="(offer,k) in offers" :key="k"
      :title="offer.service_name" :logo="offer.company_logo" :index="offer.id"
      :company="offer.company_name" :highlighted="true"
      @delete="trash" @view="viewModal" :highlightExpiration="offer.highlighted_expiration"
      ></offer>
    </div>
    <offer-details v-if="currentOffer&&viewMode" :offer="currentOffer">
    </offer-details>
</div>
</template>

<script>

export default {
  data(){
    return{
      baseUrl: baseUrl,
      offers:[],
      currentOffer:null,
      viewMode:false,
      updateMode: false,
      municipality:'',
      department:'',
    }
  },
  mounted(){
    //this.refreshData()
    toastr.info('Puedes buscar las ofertas activas por su municipio');
  },
  methods:{
    refreshData(){
      let fd = new FormData();

      if(this.department) fd.append("department", this.department);
      else return;

      if(this.municipality) fd.append("municipality", this.municipality);
      else return;

      axios.post(baseUrl+'/api/offers/area/highlight', fd)
      .then(res=>{
        console.log(res);
        this.offers = res.data;
      }).catch(err=>{
        console.log("ERROR FROM SERVER ",err.response);
        if (err.response.data.errorMessage){
          toastr.error(err.response.data.errorMessage);
        }
      });
    },
    async trash(id){
      let offer= await this.offers.find(offerItem=>offerItem.id===id)
      let fd = new FormData();
      fd.append("highlighted_expiration", offer.highlighted_expiration);

      axios.post(baseUrl+'/api/offers/highlight/'+id,fd)
      .then(res=>{
        console.log(res);
        toastr.success("Oferta Descartada con éxito");
        this.refreshData();
      }).catch(err=>{
        if (err.response.data.errorMessage){
          toastr.error(err.response.data.errorMessage);
        }
      });
    },
    async setOffer(id){
      let currentOffer = await this.offers.find(offer=>offer.id===id);
      this.currentOffer= currentOffer;
    },
    async viewModal(id){
      await this.setOffer(id)
      this.viewMode=true;
    },
    viewSelected(offer){
      console.log("offer from selected one" , offer, this.currentOffer, this.viewMode);
      this.currentOffer=offer;
      this.viewMode=true;
    },
  }
}

</script>
