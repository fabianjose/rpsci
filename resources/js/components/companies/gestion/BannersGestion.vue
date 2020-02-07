<template>
<div class="container-fluid">
    <div class="row justify-content-center py-4">
        <div class="col-10 col-lg-12">
            <company-highlight @refresh="refreshData" :companies="companies"></company-highlight>
        </div>
    </div>
    <h5 class="mt-4 mb-2 text-center">Empresas Destacadas</h5>
    <div class="row justify-content-space-between py-4">
        <company v-for="(company,k) in companies" :key="k"
            :title="company.name" :logo="company.logo" :index="company.id"
            @view="viewModal" @delete="trash" :noEdit="true"></company>
    </div>
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
      viewMode:false,
    }
  },
  mounted(){
    this.refreshData();
  },
  methods:{
    refreshData(){
      let loader = this.$loading.show();
      axios.get(baseUrl+'/api/companies/highlighted')
      .then(res=>{
        console.log(res);
        this.companies=res.data;
      }).catch(err=>{
        console.log("ERROR FROM SERVER ",err.response);
        if (err.response.data.errorMessage){
          toastr.error(err.response.data.errorMessage);
        }else{
          toastr.error('Error al obtener las empresas destacadas');
        }
      }).finally(()=>loader.hide());
    },
    async setCompany(id){
      let currentCompany = await this.companies.find(company=>company.id===id);
      this.currentCompany= currentCompany;
    },
    trash(id){
      let loader = this.$loading.show();
      axios.put(baseUrl+'/api/company/'+id+'/dehighlight')
      .then(res=>{
        console.log(res);
        toastr.success("Compañía sacada de destacadas");
        this.refreshData();
      }).catch(err=>{
        console.log("ERROR FROM SERVER ",err.response);
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
