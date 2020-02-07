<template>
    <div class="main-middle" >
        <img class="ic-logo-grey my-2" :src="baseUrl+'/images/logo-blanco.png'" alt="">
        <div class="main-search-form p-3 mt-3" >
            <div class="main-form-title-container text-center justify-content-center pt-2 py-1 px-3">
                <h6 class="main-form-title font-weight-bold text-center">Encuentra el servicio que deseas</h6>
            </div>
            <div class="d-flex flex-row flex-wrap justify-content-around p-3">
                <div class="form-group has-search ci-select-container col-md-6 col-sm-10 col-lg-4">
                    <span class="fa fa-tv form-control-feedback "></span>
                    <select class="custom-select ci-select rounded-pill" v-model="service">
                        <option value="" class="d-none" selected>Servicio</option>
                        <option v-for="(service,index) in services" :key="index"
                            :value="service.name">{{service.name}}
                        </option>
                    </select>
                </div>
                <div class="form-group has-search col-md-6 col-sm-10 col-lg-4">
                    <span class="fas fa-map-marker-alt form-control-feedback "></span>
                    <select class="custom-select ci-select rounded-pill" v-model="department" @change="getMunicipalities">
                      <option value="" class="d-none" selected>Departamento</option>
                      <option v-for="(department,index) in departments" :key="index" :value="department.name">{{department.name}}</option>
                    </select>
                    <!-- <autocomplete-vue
                        @selected="setDepartment"
                        url="/api/departments"
                        requestType="get"
                        placeholder="Departamento"
                        property="name"
                        :required="true"
                        :threshold="1"
                        inputClass="form-control rounded-pill rounded-input"
                    ></autocomplete-vue> -->
                </div>
                <div class="form-group has-search col-md-6 col-sm-10 col-lg-4">
                    <span class="fa fa-city form-control-feedback "></span>
                    <select class="custom-select ci-select rounded-pill" v-model="municipality">
                      <option value="" class="d-none" selected>Municipio</option>
                      <option v-for="(municipality,index) in municipalities" :key="index" :value="municipality.name">{{municipality.name}}</option>
                    </select>
                    <!-- <autocomplete-vue
                        @selected="setMunicipality"
                        ref="municipalitiesList"
                        placeholder="Municipio"
                        property="name"
                        :required="true"
                        :threshold="1"
                        prefixClass="form-group"
                        inputClass="form-control rounded-pill rounded-input"
                    ></autocomplete-vue> -->
                </div>
                <div class="col-md-6 col-sm-10" @click="search" >
                    <i class="fa fa-search icon-btn"></i>
                    <button class="btn btn-block btn-dark-blue rounded-pill">
                        Buscar
                    </button>
                </div>
            </div>
            <div class="d-flex flex-row flex-wrap col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6 py-2 mx-auto justify-content-center">
                <div class=" text-center custom-control custom-radio col-10 col-sm-10 col-md-6 col-lg-6 col-xl-6" @click="offerType='private';" >
                    <input type="radio" class="custom-control-input" :checked="offerType=='private'" id="privateOffer" >
                    <label class="custom-control-label" for="privateOffer">Soy un particular</label>
                </div>
                <div class=" text-center custom-control custom-radio col-10 col-sm-10 col-md-6 col-lg-6 col-xl-6" @click="offerType='company';" >
                    <input type="radio" class="custom-control-input" :checked="offerType=='company'" id="companyOffer">
                    <label class="custom-control-label" for="companyOffer">Soy una empresa</label>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  props:['errors'],
  data(){
    return{
      municipality:"",
      department:"",
      service:"",
      baseUrl:baseUrl,
      offerType:"private",
      services:[],
      departments:[],
      municipalities:[],
    }
  },

  mounted(){
    if (this.errors){
      let allErrors = this.errors;
      for (var errorkey in allErrors) {
        if (allErrors[errorkey]){
          for (var error of allErrors[errorkey]) {
            toastr.error(error);
          }
        }
      }
    };
    this.getServices();
    this.getDepartments();
  },
  methods:{
    getServices(){
      axios.get(baseUrl+"/api/services")
      .then(res=>{
        this.services=res.data;
      })
      .catch(err=>{
        console.log("ERROR FROM SERVER ", err,err.response);
        toastr.error("error al cargar los servicios");
      });
    },
    getDepartments(){
      axios.get(baseUrl+"/api/departments")
      .then(res=>{
        this.departments = res.data;
      })
      .catch(err=>{
        console.log("ERROR FROM SERVER ", err,err.response);
        toastr.error("error al cargar los departamentos");
      });
    },
    setDepartment(val){
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
        // console.log(this.$refs);
        // if(!this.hideMunicipality) this.$refs.municipalitiesList.setEntries(res.data)
        // else this.$emit("newMunicipalities", res.data);
        this.municipalities = res.data;
      }).catch(err=>{
        console.log("ERROR FROM SERVER ", err,err.response);
        toastr.error("Error al cargar los municipios");
      });
    },
    getExtras(){

      let query="?";

      query+="department="+this.department;
      query+="&municipality="+this.municipality;
      query+="&service="+this.service;
      query+="&offer_type="+this.offerType;

      return query;

    },
    search(){
      console.log("type ", this.offerType)
      let loader = this.$loading.show();
      window.location.replace(baseUrl+"/offers/search"+this.getExtras())
    },
  },
}
</script>
