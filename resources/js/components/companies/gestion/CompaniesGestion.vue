<template>
<div class="container-fluid">
    <div class="row justify-content-center py-4">
        <div class="col-10 col-lg-12">
            <company-creation></company-creation>
        </div>
    </div>
    <h5 class="mt-4 mb-2 text-center">Empresas Disponibles</h5>
    <div class="row justify-content-space-between py-4">
        <company v-for="(company,k) in companies" :key="k"
            :title="company.name" :logo="company.logo" :index="company.id"
            @view="viewModal" @edit="update" @delete="trash" ></company>
    </div>
    <c-modal v-if="currentCompany">
        <company
            :title="currentCompany.name" :logo="currentCompany.logo" :index="currentCompany.id"
            @view="viewModal" @edit="update" @delete="trash" ></company>
    </c-modal>
</div>
</template>

<script>

export default {

    data(){
        return{
            baseUrl: baseUrl,
            companies:[],
            currentCompany:null,
        }
    },

    mounted(){
        this.refreshData();
    },

    methods:{
        refreshData(){
            axios.get(baseUrl+'/api/companies')
            .then(res=>{
                console.log(res);
                this.companies=res.data;
            }).catch(err=>{
                console.log(err.response);
            });
        },

        update(id){

        },

        trash(id){
            axios.delete(baseUrl+'/api/company/'+id)
            .then(res=>{
                console.log(res);
                toastr.success("Compañía eliminada con éxito");
                this.refreshData();
            }).catch(err=>{
                console.log(err.response);
            });
        },

        async viewModal(id){
            let currentCompany = await this.companies.find(company=>company.id===id);
            this.currentCompany= currentCompany;
        }

    }

}

</script>
