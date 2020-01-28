<template>
  <div class="container-fluid">
    <div class="row justify-content-center py-4">
      <div class="col-12 col-md-10 col-lg-10">
        <location-creation @creatingDone="refreshData" />
      </div>
    </div>
    <div class="row justify-content-center py-4">
      <div class="col-12 col-lg-10">
        <div class="card card-info" id="locationsListAccordion">
          <a class="card-header collapsed" @click="active=!active" data-parent="#locationsListAccordion" href="#collapseLocations" aria-expanded="false" data-toggle="collapse">
            <h3 class="card-title">Locaciones Disponibles</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool ml-auto" >
                <personal-fab :active="active" />
              </button>
            </div>
          </a>
          <div id="collapseLocations" class="panel-collapse in collapse">
            <div class="card-body p-0">
              <ul class="list-group p-0">
                <!-- <service v-for="(service,k) in services" :key="k" :title="service.name" :index="service.id" @delete="trash" @view="viewModal" @edit="update" /> -->
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data(){
    return{
      departments:[],
      currentLocation:null,
      viewMode:false,
      updateMode: false,
      active:false,
    }
  },
  mounted(){
    this.refreshData();
  },
  methods:{
    refreshData(){
      axios.get(baseUrl+'/api/departments')
      .then(res=>{
        console.log(res);
        this.departments=res.data;
      }).catch(err=>{
        console.log("ERROR FROM SERVER ",err.response);
        if (err.response.data.errorMessage){
          toastr.error(err.response.data.errorMessage);
        }
      });
    },
    // trash(id){
    //   let loader = this.$loading.show();
    //
    //   axios.delete(baseUrl+'/api/service/'+id)
    //   .then(res=>{
    //     console.log(res);
    //     toastr.success("Servicio eliminado con éxito");
    //     this.refreshData();
    //   }).catch(err=>{
    //     if (err.response.data.errorMessage){
    //       toastr.error(err.response.data.errorMessage);
    //     }
    //   }).finally(()=>loader.hide());
    // },
    // async setService(id){
    //   let currentService = await this.services.find(service=>service.id===id);
    //   this.currentService= currentService;
    // },
    // async viewModal(id){
    //   await this.setService(id)
    //   this.viewMode=true;
    // },
    // async update(id){
    //   await this.setService(id);
    //   this.updateMode=true;
    // }
  }
}
</script>
