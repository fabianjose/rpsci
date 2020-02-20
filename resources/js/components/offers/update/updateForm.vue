<template>
<div class="modal fade" id="modalEditOffer" aria-modal="true" style="padding-right: 15px; display: block;">

  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h4 class="modal-title">Editar Oferta</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="d-flex flex-row w-100 justify-content-around flex-wrap">
          <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
            <label>Empresa</label>
            <autocomplete-vue
            v-model="offer.company_name"
            url="/api/companies"
            requestType="get"
            placeholder="Empresa"
            property="name"
            :required="true"
            :threshold="1"
            inputClass="form-control"
            ></autocomplete-vue>
          </div>
          <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
            <label>Servicio</label>
            <select class="custom-select" @change="getFields" v-model="offer.service">
              <option :value="service.id" v-for="service in services"  :key="service.id">{{service.name}}</option>
            </select>
          </div>
        </div>
        <div class="d-flex flex-row w-100 justify-content-around flex-wrap" v-if="!offer.fields_values.length&&fields.length">
          <div class="form-group col-xl-4 col-lg-4 col-md-6 col-12" v-for="(field,index) in fields" >
            <label>{{field.name+(field.unit?" ("+field.unit+")":"")}}</label>
            <input v-model="fields_values[index]" class="form-control">
          </div>
        </div>
        <div class="d-flex flex-row w-100 justify-content-around flex-wrap" v-else>
          <div class="form-group col-xl-4 col-lg-4 col-md-6 col-12" v-for="(field,index) in offer.fields_values" >
            <label>{{field.field_name+(field.unit?" ("+field.unit+")":"")}}</label>
            <input v-model="offer.fields_values[index].value" class="form-control">
          </div>
        </div>
        <div class="d-flex flex-row w-100 justify-content-around flex-wrap">
          <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <label>Descripcion</label>
            <textarea class="form-control" rows="3" placeholder="Descripcion..." v-model="offer.benefits" style="resize: none;"></textarea>
          </div>
          <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 py-3 pt-4">
              <div class="card card-primary" id="MunicipalitiesAccordion">
                <a class="card-header collapsed" @click="active2=!active2" data-parent="#MunicipalitiesAccordion"
                    href="#MunicipalitiesOfferList" aria-expanded="false" data-toggle="collapse">
                    <h3 class="card-title col-10">Municipios seleccionados</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool ml-auto " >
                          <personal-fab :active="active2" />
                      </button>
                    </div>
                </a>

                <div id="MunicipalitiesOfferList" class="panel-collapse in collapse" >
                  <div class="card-body w-100">
                  
                      <div class="d-flex justify-content-around w-100 flex-wrap">
                        <ul class="list-group list-group-unbordered mb-3 w-100">
                          <li v-for="(municipality,k) in offer.municipalities?JSON.parse(offer.municipalities):municipalities" :key="k" class="list-group-item px-0">
                              <b>{{municipality}}</b>
                              <a class="float-right">
                                <button type="button" class="btn btn-tool p-1" @click="deleteMunicipality(k)">
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
        
        <zone-select middle="col-xl-6 col-lg-6 col-md-6 col-12 py-3" 
          :defaultDepartment="offer.department&&offer.department_name?offer.department_name:null" 
          :defaultMunicipality="offer.municipality&&offer.municipality_name?offer.municipality_name:null" 
          @newDepartment="newDepartment" @newMunicipality="newMunicipality"  ></zone-select>


        <div class="d-flex flex-row w-100 justify-content-around flex-wrap">
          <div class="form-group col-xl-4 col-lg-4 col-md-6 col-12">
            <label>Tarifa</label>
            <input v-model="offer.tariff" class="form-control">
          </div>
          <div class="form-group col-xl-4 col-lg-4 col-md-6 col-12">
            <label>Tipo</label>
            <select class="custom-select" v-model="offer.type">
              <option :value="null">Todos</option>
              <option value="private">Hogar</option>
              <option value="company">Empresa</option>
            </select>
          </div>
          <div class="form-group col-xl-4 col-lg-4 col-md-6 col-12">
            <label>Puntuacion (Opcional)</label>
            <select class="custom-select" v-model="offer.points">
              <option value="0" selected>0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-outline-info" @click="editOffer">Editar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>

</div>
</template>

<script>
export default {
  props:["offer","services"],

  data(){
    return{
      active2:false,
      fields_values:[],
      municipalities:[],
      fields:[],
    }
  },

  mounted(){
    if(!this.offer.fields_values) this.getFields()
  },

  methods:{
    newDepartment(department){
      this.offer.department_name=department;
    },

    newMunicipality(municipality){
      this.offer.municipality_name=municipality;
    },

    getFields(){
      console.log("ser-vice",this.offer.service)
      axios.get(baseUrl+"/api/service/"+this.offer.service+"/fields")
      .then(res=>{
        console.log("campos  ", res)
        this.fields=res.data;
        this.offer.fields_values=null;
      }).catch(err=>{console.error(err);toastr.error("error al obtener los campos del servicio")})
    },

    async editOffer(){

      let valuesArray=[];

      if(this.fields.length){
        let continueCreation=true;

        await this.fields.map((field, i)=>{
          if (!this.fieldsValues[i]||this.fieldsValues[i]==""){
            continueCreation=false;
          }
          else valuesArray.push({
            "field_id":field.id,
            "value":this.fieldsValues[i]
          });
        });

        if(!continueCreation) {
          return toastr.error('Debe llenar los campos referentes al servicio seleccionado');
        }

      }else if(this.offer.fields_values.length){
        if(this.offer.fields_values.length){
          for(let i=0; i< this.offer.fields_values.length; i++){
            if(!this.offer.fields_values[i].value){
              toastr.error('Debe llenar los campos referentes al servicio seleccionado');
              return false;
            }
            else {
              let {field_id,value}=this.offer.fields_values[i];
              valuesArray.push({
                field_id,
                value
              });
            }
          }
        }
        else return toastr.error('Debe llenar los campos referentes al servicio seleccionado');
      }

      let fd= new FormData();
      fd.append("company", this.offer.company_name);
      fd.append("service", this.offer.service);
      fd.append("benefits", this.offer.benefits);
      if(this.offer.department_name) fd.append("department", this.offer.department_name);
      if(this.offer.municipality_name) fd.append("municipality", this.offer.municipality_name);
      fd.append("tariff", parseInt(this.offer.tariff));
      if(this.offer.type) fd.append("type", this.offer.type);
      fd.append("points", this.offer.points);
      fd.append("fields_values", valuesArray.length?JSON.stringify(valuesArray):null);
      fd.append("_method","put");
      axios.post(baseUrl+"/api/offer/"+this.offer.id, fd)
      .then(res=>{
        console.log("RESPONSE FROM SERVER ",res);

        toastr.success("Oferta editada con éxito");
        setTimeout(function(){
          window.location.reload();
        }, 2000);
      })
      .catch(err=>{
        if(err.response.status===403){
          window.location.replace(baseUrl+"/login");
        }
        console.log("ERROR FROM SERVER ",err.response);
        if (err.response.data.errorMessage){
          toastr.error(err.response.data.errorMessage);
        }else {
          let allErrors = err.response.data;
          for (var errorkey in allErrors) {
            if (allErrors[errorkey]){
              for (var error of allErrors[errorkey]) {
                toastr.error(error);
              }
            }
          }
        }
      });
    }
  }
}
</script>
