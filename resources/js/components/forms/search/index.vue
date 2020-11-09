
<template>
    <div class="main-middle" >
        <div class="main-search-form py-3 px-1 mt-3" >
           
            <div class="d-flex flex-row flex-wrap justify-content-around py-3 pt-4 px-1">
               
               <div class=" text-center custom-control custom-radio form-group has-search col-md-6 col-sm-10 col-lg-1" @click="offerType='private';" >
                    <input type="radio" class="custom-control-input" :checked="offerType=='private'" id="privateOffer" >
                    <label class="custom-control-label" for="privateOffer">Hogar</label>
                </div>

                <div class=" text-center custom-control custom-radio form-group has-search col-md-6 col-sm-10 col-lg-2" @click="offerType='company';" >
                    <input type="radio" class="custom-control-input" :checked="offerType=='company'" id="companyOffer">
                    <label class="custom-control-label" for="companyOffer">Empresa</label>
                </div>
                <div class="form-group has-search ci-select-container col-md-6 col-sm-10 col-lg-2">
                    <span class="fa fa-tv form-control-feedback "></span>
                    <select class="custom-select ci-select rounded-pill" v-model="service">
                        <option value="" class="d-none" selected>Servicio</option>
                        <option v-for="(service,index) in services" :key="index"
                            :value="service.name">{{service.name}}
                        </option>
                    </select>
                </div>

                <div class="form-group has-search col-md-6 col-sm-10 col-lg-3">
                    <span class="fas fa-map-marker-alt form-control-feedback "></span>
                    <select class="custom-select ci-select rounded-pill" v-model="department" @change="getMunicipalities">
                      <option value="" class="d-none" selected>Departamento</option>
                      <option v-for="(department,index) in departments" :key="index" :value="department.name">{{department.name}}</option>
                    </select>
                 
                </div>

                <div class="form-group has-search col-md-6 col-sm-10 col-lg-2">
                    <span class="fa fa-city form-control-feedback "></span>
                    <select class="custom-select ci-select rounded-pill" v-model="municipality">
                      <option value="" class="d-none" selected>Municipio</option>
                      <option v-for="(municipality,index) in municipalities" :key="index" :value="municipality.name">{{municipality.name}}</option>
                    </select>
               
                </div>
                
                
                  
                
                 <div class="form-group has-search col-md-6 col-sm-10 col-lg-2" @click="search" >
                <i class="fa fa-search icon-btn"></i>
                <button class="btn btn-danger">
                    Buscar
                </button>
            </div>
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

    search(){
      console.log("type ", this.offerType)
      
      let loader = this.$loading.show();
      
      let query="?";
      
      if(this.department&&this.department!="") query+="department="+this.department;
      else {loader.hide();return toastr.error("rellene todos los campos");}
      
      if(this.municipality&&this.municipality!="") query+="&municipality="+this.municipality;
      else {loader.hide();return toastr.error("rellene todos los campos");}
      
      if(this.service&&this.service!="")  query+="&service="+this.service;
      else {loader.hide();return toastr.error('rellene todos los campos');}

      query+="&offer_type="+this.offerType;
      
      window.location.replace(baseUrl+"/offers/search"+query)
    },
  },
}
</script>









