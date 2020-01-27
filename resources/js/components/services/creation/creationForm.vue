<template>
    <div class="card card-info" id="createServiceAccordion">
      <a class="card-header collapsed" @click="active=!active" data-parent="#createServiceAccordion"
      href="#collapseCreateService" aria-expanded="false" data-toggle="collapse">
        <h3 class="card-title">Nuevo Servicio</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool ml-auto " >
            <personal-fab :active="active" />
          </button>
        </div>
      </a>

      <div id="collapseCreateService" class="panel-collapse in collapse" >
        <div class="card-body">

          <div class="form-group">
            <label>Nombre del Servicio</label>
            <input v-model="name" class="form-control">
          </div>

          <div class="form-group">
            <label>Campos del servicio</label>
          </div>

        <div class="card card-success" id="createServiceFieldAccordion">
            <a class="card-header collapsed" @click="active2=!active2" data-parent="#createServiceFieldAccordion"
                href="#collapseCreateServiceField" aria-expanded="false" data-toggle="collapse">
                <h3 class="card-title">Nuevo Campo</h3>
                <div class="card-tools">
                <button type="button" class="btn btn-tool ml-auto " >
                    <personal-fab :active="active2" />
                </button>
                </div>
            </a>

            <div id="collapseCreateServiceField" class="panel-collapse in collapse" >
                <div class="card-body">

                <div class="form-group">
                    <label>Nombre del Campo</label>
                    <input v-model="newFieldLabel" class="form-control">
                </div>

                <div class="form-group">

                    <label>Tipo de Campo</label>

                    <select v-model="newFieldType" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                        <option selected value="string" data-select2-id="1">Texto</option>
                        <option value="number" data-select2-id="2">Numero</option>
                        <!-- <option value="select" data-select2-id="3">Seleccionable</option> -->
                    </select>

                </div>

                </div>

                <div class="card-footer">
                    <button type="button" class="btn btn-outline-success" @click="submitNewField">Agregar Campo</button>
                </div>
            </div>
        </div>

        <div class="card card-primary" id="ServicesFieldsAccordion">
            <a class="card-header collapsed" @click="active3=!active3" data-parent="#ServicesFieldsAccordion"
                href="#collapseServicesFields" aria-expanded="false" data-toggle="collapse">
                <h3 class="card-title">Lista de Campos</h3>
                <div class="card-tools">
                <button type="button" class="btn btn-tool ml-auto " >
                    <personal-fab :active="active3" />
                </button>
                </div>
            </a>

            <div id="collapseServicesFields" class="panel-collapse in collapse" >
                <div class="card-body">

                    <ul class="list-group list-group-unbordered mb-3">
                        <li v-for="(field,k) in fields" :key="k" class="list-group-item">
                            <b>{{field.label}}</b>
                            <a class="float-right">{{getFieldType(field.type)}}
                              <button type="button" class="btn btn-tool p-1" @click="deleteField(field.label)">
                                <i class="float-button fas fa-plus-circle active text-danger"></i>
                              </button>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>

        </div>

        <div class="card-footer">
            <button type="button" class="btn btn-outline-success" @click="submitNewService">Agregar</button>
        </div>
      </div>
    </div>
</template>

<script>
export default {
  name: 'companyCreation',
  data(){
    return {
      active:false,
      active2:false,
      active3:false,
      name:"",
      logo:null,
      nit:"",
      phone:"",
      web:"",
      fields:[],
      newFieldLabel:"",
      newFieldType:"",
    }
  },
  mounted(){
    console.log(baseUrl);
  },
  methods:{
    uploadFile: function(){
      console.log("[File] Change")
      let uploadFile=this.$refs.SelectFile.files[0]
      if(!uploadFile){
        console.log("[File] None")
        return;
      }
      this.logo=uploadFile;
    },
    submitNewField(){
      this.OpenAccordion("#ServicesFieldsAccordion","#collapseServicesFields", "active3");
      if (this.fields.length >= 3){
        toastr.error('Solo puedes añadir hasta 3 campos');
      }else{
        if (!this.newFieldLabel || !this.newFieldType) {
          return toastr.error('Debe llenar ambos campos');
        }
        this.fields.push({
          label:this.newFieldLabel,
          type:this.newFieldType,
        });
        toastr.success('Campo '+ this.newFieldLabel +' añadido');
        this.newFieldLabel = "";
        this.newFieldType = "";
      }
    },
    getFieldType(label=string){
      switch (label) {
        case "string":
        return "Texto"
        break;
        case "number":
        return "Numero"
        break;
        case "select":
        return "Seleccionable"
        break;

        default:
        break;
      }
    },
    submitNewService: function(){
      let fd= new FormData();
      fd.append("name", this.name);
      fd.append("fields", this.fields.length?JSON.stringify(this.fields):"");
      axios.post(baseUrl+'/api/service',fd)
      .then(res=>{
        console.log("RESPONSE FROM SERVER ",res);
        toastr.success(res.data);
        this.name = "";
        this.fields = [];
        this.$emit("creatingDone")
      }).catch(err=>{
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

    },
    deleteField(label){
      this.fields = this.fields.filter((el)=> el.label != label);
    },
    OpenAccordion(parentId,childId,activeIndex){
      if(!$(parentId).hasClass("collapsed")) $(parentId).addClass("collapsed");
      else return;
      if(!$(childId).hasClass("show")) $(childId).addClass("show");
      else return;
      this[activeIndex]= !this[activeIndex];
    },
  }
}
</script>
