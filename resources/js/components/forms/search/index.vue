<template>
    <div class="main-middle" >
        <img class="ic-logo-grey my-2" :src="baseUrl+'/images/logo-blanco.png'" alt="">
        <div class="main-search-form p-3 mt-3" >
            <div class="main-form-title-container text-center justify-content-center pt-2 py-1 px-3">
                <h6 class="main-form-title font-weight-bold text-center">Encuentra el servicio que deseas</h6>
            </div>
            <div class="d-flex flex-row flex-wrap justify-content-around p-3">
                <div class="form-group has-search col-md-6 col-sm-10 col-lg-4">
                    <span class="fas fa-map-marker-alt form-control-feedback "></span>
                    <autocomplete-vue
                        @selected="setDepartment"
                        url="/api/departments"
                        requestType="get"
                        placeholder="Departamento"
                        property="name"
                        :required="true"
                        :threshold="1"
                        inputClass="form-control rounded-pill rounded-input"
                    ></autocomplete-vue>
                </div>
                <div class="form-group has-search col-md-6 col-sm-10 col-lg-4">
                    <span class="fa fa-city form-control-feedback "></span>
                    <autocomplete-vue
                        @selected="setMunicipality"
                        ref="municipalitiesList"
                        placeholder="Municipio"
                        property="name"
                        :required="true"
                        :threshold="1"
                        inputClass="form-control rounded-pill rounded-input"
                    ></autocomplete-vue>
                </div>
                <div class="form-group has-search col-md-6 col-sm-10 col-lg-4">
                    <span class="fa fa-tv form-control-feedback "></span>
                    <autocomplete-vue
                        @selected="setService"
                        url="/api/services"
                        requestType="get"
                        placeholder="Servicio"
                        property="name"
                        :required="true"
                        :threshold="1"
                        inputClass="form-control rounded-pill rounded-input"
                    ></autocomplete-vue>
                </div>
                <div class="col-md-6 col-sm-10" @click="search" >
                    <i class="fa fa-search icon-btn"></i>
                    <button class="btn btn-block btn-dark-blue rounded-pill">
                        Buscar
                    </button>
                </div>
                <div class="col-10">
                    
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            municipality:"",
            department:"",
            service:"",
            baseUrl:baseUrl,
            offerType:"private"
        }
    },

    methods:{

        displayType(offerType){
            switch (offerType) {
                case "company":
                    return "Soy una empresa"
                    break;
            
                default:
                    return "Soy un particular"
                    break;
            }
        },

        setDepartment(val){
            console.log("new val ",val);
            this.department=val;
            this.getMunicipalities();
        },

        setMunicipality(val){
            console.log("new val ",val);
            this.municipality=val;
        },

        setService(val){
            console.log("new val ",val);
            this.service=val;
            if(!this.noRequest)this.getMunicipalities();
        },

        getMunicipalities(){
            axios.get(baseUrl+'/api/municipalities/'+this.department)
            .then(res=>{
                console.log(res);
                console.log(this.$refs);
                if(!this.hideMunicipality) this.$refs.municipalitiesList.setEntries(res.data)
                else this.$emit("newMunicipalities", res.data);
            }).catch(err=>{
                console.log("ERROR FROM SERVER ", err,err.response);
                toastr.error("error al cargar los municipios");
            });
        },

        getExtras(){
            
            let query="?";

            query+="department="+this.department;
            query+="&municipality="+this.municipality;
            query+="&service="+this.service;
            query+="&offer_type"+this.offerType;

            return query;

        },

        search(){      
            let loader = this.$loading.show();
            
            axios.get(baseUrl+"/api/offers/search"+this.getExtras())
            .then(res=>{
                
                console.log("response", res);

            }).catch(err=>{
            
                console.log("ERROR",err.response);
            
            }).finally(()=>loader.hide());
        },
    },
}
</script>