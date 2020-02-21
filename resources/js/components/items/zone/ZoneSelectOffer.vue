<template>
    <div class="d-flex w-100 flex-column justify-content-around">


        <div class="row w-100 flex-wrap justify-content-around">
            <div class="col-12">
              <div class="card card-primary" id="DepartmentsField">
                <a class="card-header collapsed" @click="activeD=!activeD" data-parent="#DepartmentsField"
                    href="#collapseDepartmentsField" aria-expanded="false" data-toggle="collapse">
                    <h3 class="card-title">Departamentos</h3>
                    <div class="card-tools">
                    <button type="button" class="btn btn-tool ml-auto " >
                        <personal-fab :active="activeD" />
                    </button>
                    </div>
                </a>

                <div id="collapseDepartmentsField" class="panel-collapse in collapse" >
                    <div class="card-body">
                        <div class="row w-100 flex-wrap justify-content-around">
                            <div class="col-10 col-xl-6">
                                <div class="card card-success" id="addDepartmentAccordion">
                                    <a class="card-header collapsed" @click="active=!active" data-parent="#addDepartmentAccordion"
                                    href="#addDepartmentAccordionCollapse" aria-expanded="false" data-toggle="collapse">
                                    <h3 class="card-title col-10">Seleccionar departamento</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool ml-auto " >
                                        <personal-fab :active="active" />
                                        </button>
                                    </div>
                                    </a>
                                    <div id="addDepartmentAccordionCollapse" class="panel-collapse in collapse" >
                                        <div class="card-body">
                                            <div class="form-group col-12">
                                                <label>Departamento</label>
                                                <select class="custom-select ci-select rounded-pill" v-model="department">
                                                    <option value="" class="d-none" selected>Departamento</option>
                                                    <option v-for="(department,index) in departments" :key="index" :value="department.name">{{department.name}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="button" class="btn btn-outline-success" @click="addDepartment">Agregar Departamento</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-10 col-xl-6">
                                <div class="card card-info" id="departmentsAccordion">
                                    <a class="card-header collapsed" @click="active2=!active2" data-parent="#departmentsAccordion"
                                    href="#DepartmentsOfferList" aria-expanded="false" data-toggle="collapse">
                                    <h3 class="card-title col-10">Departamentos seleccionados</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool ml-auto " >
                                        <personal-fab :active="active2" />
                                        </button>
                                    </div>
                                    </a>
                                    <div id="DepartmentsOfferList" class="panel-collapse in collapse" >
                                        <div class="card-body w-100">
                                        
                                            <div class="d-flex justify-content-around w-100 flex-wrap">
                                                <ul class="list-group list-group-unbordered mb-3 w-100">
                                                <li v-for="(department,k) in departmentsSelected" :key="k" class="list-group-item px-0">
                                                    <b>{{department}}</b>
                                                    <a class="float-right">
                                                        <button type="button" class="btn btn-tool p-1" @click="deleteDepartment(k)">
                                                        <i class="float-button fas fa-plus-circle active text-danger"></i>
                                                        </button>
                                                    </a>
                                                </li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>

        

        <div class="row w-100 flex-wrap justify-content-around">
            <div class="col-12">
              <div class="card card-primary" id="MunicipalitiesField">
                <a class="card-header collapsed" @click="activeM=!activeM" data-parent="#MunicipalitiesField"
                    href="#collapseMunicipalitiesField" aria-expanded="false" data-toggle="collapse">
                    <h3 class="card-title">Municipios</h3>
                    <div class="card-tools">
                    <button type="button" class="btn btn-tool ml-auto " >
                        <personal-fab :active="activeM" />
                    </button>
                    </div>
                </a>

                <div id="collapseMunicipalitiesField" class="panel-collapse in collapse" >
                    <div class="card-body">
                        <div class="row w-100 flex-wrap justify-content-around">
                            <div class="col-10 col-xl-6">
                                <div class="card card-success" id="addMunicipalityAccordion">
                                    <a class="card-header collapsed" @click="active3=!active3" data-parent="#addMunicipalityAccordion"
                                    href="#addMunicipalityAccordionCollapse" aria-expanded="false" data-toggle="collapse">
                                    <h3 class="card-title col-10">Seleccionar Municipio</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool ml-auto " >
                                        <personal-fab :active="active3" />
                                        </button>
                                    </div>
                                    </a>
                                    <div id="addMunicipalityAccordionCollapse" class="panel-collapse in collapse" >
                                        <div class="card-body">
                                            <div class="form-group col-12">
                                            <label>Departamento</label>
                                            <select class="custom-select ci-select rounded-pill" v-model="selectedDepartment" @change="customMunicipalities">
                                                <option value="" class="d-none" selected>Departamento</option>
                                                <option v-for="(department,index) in departmentsSelected" :key="index" :value="department">{{department}}</option>
                                            </select>
                                            </div>
                                            <div v-if="selectedDepartment" class="form-group col-12">
                                                <label>Municipio</label>
                                                <select class="custom-select ci-select rounded-pill" v-model="municipality">
                                                    <option value="" class="d-none" selected>Municipio</option>
                                                    <option v-for="(municipality,index) in municipalities" :key="index" :value="municipality.name">{{municipality.name}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="button" class="btn btn-outline-success" @click="addMunicipality">Agregar Municipio</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-10 col-xl-6">
                                <div class="card card-info" id="municipalitiesAccordion">
                                    <a class="card-header collapsed" @click="active4=!active4" data-parent="#municipalitiesAccordion"
                                    href="#MunicipalitiesOfferList" aria-expanded="false" data-toggle="collapse">
                                    <h3 class="card-title col-10">Municipios seleccionados</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool ml-auto " >
                                        <personal-fab :active="active4" />
                                        </button>
                                    </div>
                                    </a>
                                    <div id="MunicipalitiesOfferList" class="panel-collapse in collapse" >
                                        <div class="card-body w-100">
                                        
                                            <div class="d-flex justify-content-around w-100 flex-wrap">
                                                <ul class="list-group list-group-unbordered mb-3 w-100">
                                                <li v-for="(municipality,k2) in municipalitiesSelected" :key="k2" class="list-group-item px-0">
                                                    <b>{{municipality}}</b>
                                                    <a class="float-right">
                                                        <button type="button" class="btn btn-tool p-1" @click="deleteMunicipality(k2)">
                                                        <i class="float-button fas fa-plus-circle active text-danger"></i>
                                                        </button>
                                                    </a>
                                                </li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>

    </div>
</template>

<script>
export default {
    props:["defaultDepartments","defaultMunicipalities"],
    data(){
        return {
          activeD:false,
          activeM:false,
          active:false,
          active2:false,
          active3:false,
          municipality:null,
          department:null,
          selectedDepartment:null,
          active4:false,
          departments:[],
          departmentsSelected:this.defaultDepartments?this.defaultDepartments:[],
          municipalities:[],
          municipalitiesSelected:this.defaultMunicipalities?this.defaultMunicipalities:[],
        }
    },
    mounted(){
      this.getDepartments();
    },
    methods:{

        async addMunicipality(){
            if(this.municipalitiesSelected.length) {
                let index=await this.municipalitiesSelected.findIndex((item)=>item===this.municipality);
                if(index===-1){
                    this.municipalitiesSelected.push(this.municipality);
                }else return;
            }
            else this.municipalitiesSelected.push(this.municipality);
            this.setValues();
        },

        deleteMunicipality(index){
            this.municipalitiesSelected.splice(index,1);
            this.setValues();
        },

        async addDepartment(){
            if(this.departmentsSelected.length) {
                let index=await this.departmentsSelected.findIndex((item)=>item===this.department);
                if(index===-1){
                    this.departmentsSelected.push(this.department);
                }else return;
            }
            else this.departmentsSelected.push(this.department);
            this.setValues();
        },

        deleteDepartment(index){
            this.departmentsSelected.splice(index,1);
            this.setValues();
        },
        
        reset(){
            this.municipalitiesSelected=[];
            this.municipalities=[];
            this.departmentsSelected=[];
            this.municipality=null;
            this.department=null;
        },
        getDepartments(){
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
        async setValues(){
            await this.$emit("departments",this.departmentsSelected);
            await this.$emit("municipalities",this.municipalitiesSelected);
        },

        async customMunicipalities(){
          if(!this.selectedDepartment) return;
          axios.get(baseUrl+'/api/municipalities/'+this.selectedDepartment)
            .then(res=>{
                this.municipalities=res.data;
            }).catch(err=>{
                console.log("ERROR FROM SERVER ", err,err.response);
                toastr.error("error al cargar los municipios");
            });
        },
    },
}
</script>
