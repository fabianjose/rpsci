<template>
<div class="container-fluid">
    <div class="row justify-content-center py-4">
        <div class="col-10 col-lg-12">
            <offer-creation :services="services" @refresh="refreshData"></offer-creation>
        </div>
    </div>
    <h5 class="mt-4 mb-2 text-center">Ofertas Disponibles</h5>
    <div class="row justify-content-space-between py-4">
      <offer v-for="(offer,k) in offers" :key="k"
      :title="offer.service_name" :logo="offer.company_logo" :index="offer.id"
      :company="offer.company_name"
      @delete="trash" @view="viewModal" @edit="update"
      ></offer>
    </div>
    <offer-details v-if="currentOffer&&viewMode" :offer="currentOffer">
    </offer-details>
    <offer-update v-if="currentOffer&&updateMode" :offer="currentOffer" :services="services">
    </offer-update>
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
      services: null
    }
  },
  mounted(){
    this.refreshData();
  },
  methods:{
    refreshData(){
      axios.get(baseUrl+'/api/services')
      .then(res=>{
        // console.log(res);
        this.services = res.data;
      }).catch(err=>{
        console.log("ERROR FROM SERVER ",err.response);
        if (err.response.data.errorMessage){
          toastr.error(err.response.data.errorMessage);
        }
      });
      axios.get(baseUrl+'/api/offers')
      .then(res=>{
        console.log(res.data);
        this.offers=res.data;
      }).catch(err=>{
        console.log("ERROR FROM SERVER ",err.response);
        if (err.response.data.errorMessage){
          toastr.error(err.response.data.errorMessage);
        }
      });
    },
    trash(id){
      axios.delete(baseUrl+'/api/offer/'+id)
      .then(res=>{
        console.log(res);
        toastr.success("Oferta eliminada con éxito");
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
    async update(id){
      await this.setOffer(id);
      this.updateMode=true;
    }
  }
}
</script>
