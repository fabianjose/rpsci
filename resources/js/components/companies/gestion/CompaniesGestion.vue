<template>
<div class="container-fluid">
    <div class="row justify-content-center py-4">
        <div class="col-10 col-lg-12">
            <company-creation @creatingDone="refreshData"></company-creation>
        </div>
    </div>
    <h5 class="mt-4 mb-2 text-center">Empresas Disponibles</h5>
    <div class="row justify-content-space-between py-4">
        <company v-for="(company,k) in companies" :key="k"
            :title="company.name" :logo="company.logo" :index="company.id"
            @view="viewModal" @edit="update" @delete="trash" ></company>
    </div>
    <company-update v-if="currentCompany&&updateMode" @updateDone="refreshData" :company="currentCompany">
    </company-update>
    <detailed-company v-if="currentCompany&&viewMode" :company="currentCompany">
    </detailed-company>
</div>
</template>

<script>
export default {
  data(){
    return{
      baseUrl: baseUrl,
      companies:[],
      currentCompany:null,
      updateMode:false,
      viewMode:false,
    }
  },
  mounted(){
    this.refreshData();
  },

  methods:{
    refreshData(){
      let loader = this.$loading.show();
      axios.get(baseUrl+'/api/companies')
      .then(res=>{
        console.log(res);
        this.companies=res.data;
      }).catch(err=>{
        console.log("ERROR FROM SERVER ",err.response);
        if (err.response.data.errorMessage){
          toastr.error(err.response.data.errorMessage);
        }
      }).finally(()=>loader.hide());
    },
    async setCompany(id){
      let currentCompany = await this.companies.find(company=>company.id===id);
      this.currentCompany= currentCompany;
    },
    async update(id){
      await this.setCompany(id)
      this.updateMode=true
    },
    trash(id){
      let loader = this.$loading.show();
      axios.delete(baseUrl+'/api/company/'+id)
      .then(res=>{
        console.log(res);
        toastr.success("Compañía eliminada con éxito");
        this.refreshData();
      }).catch(err=>{
        if (err.response.data.errorMessage){
          toastr.error(err.response.data.errorMessage);
        }
      }).finally(()=>loader.hide());
    },
    async viewModal(id){
      await this.setCompany(id)
      this.viewMode=true;
    }
  }
}


</script>
