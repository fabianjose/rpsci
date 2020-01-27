<template>
<div class="container-fluid">
    <div class="row justify-content-center py-4">
        <div class="col-10 col-lg-12">
            <service-creation @creatingDone="refreshData"></service-creation>
        </div>
    </div>
    <h5 class="mt-4 mb-2 text-center">Servicios Disponibles</h5>
    <div class="d-flex w-100 justify-content-center">
      <ul class="list-group col-lg-8 col-md-8 col-12">
        <service v-for="(service,k) in services" :key="k"
        :title="service.name" :index="service.id"
        @delete="trash" @view="viewModal" @edit="update"
        ></service>
      </ul>
    </div>
    <!-- <div class="row justify-content-space-between py-4">
    </div> -->
    <service-details v-if="currentService&&viewMode" :service="currentService">
    </service-details>
    <service-update v-if="currentService&&updateMode" :service="currentService">
    </service-update>
</div>
</template>

<script>
export default {
  data(){
    return{
      services:[],
      currentService:null,
      viewMode:false,
      updateMode: false,
    }
  },
  mounted(){
    this.refreshData();
  },
  methods:{
    refreshData(){
      axios.get(baseUrl+'/api/services')
      .then(res=>{
        console.log(res);
        this.services=res.data;
      }).catch(err=>{
        console.log("ERROR FROM SERVER ",err.response);
        if (err.response.data.errorMessage){
          toastr.error(err.response.data.errorMessage);
        }
      });
    },
    trash(id){

      let loader = this.$loading.show();

      axios.delete(baseUrl+'/api/service/'+id)
      .then(res=>{
        console.log(res);
        toastr.success("Servicio eliminado con éxito");
        this.refreshData();
      }).catch(err=>{
        if (err.response.data.errorMessage){
          toastr.error(err.response.data.errorMessage);
        }
      }).finally(()=>loader.hide());
    },
    async setService(id){
      let currentService = await this.services.find(service=>service.id===id);
      this.currentService= currentService;
    },
    async viewModal(id){
      await this.setService(id)
      this.viewMode=true;
    },
    async update(id){
      await this.setService(id);
      this.updateMode=true;
    }
  }
}
</script>
