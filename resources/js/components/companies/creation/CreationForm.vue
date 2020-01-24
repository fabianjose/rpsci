<template>
    <div class="card card-info" id="createCompanyAccordion">
      <a class="card-header collapsed" @click="active=!active" data-parent="#createCompanyAccordion" href="#collapseOne" aria-expanded="false" data-toggle="collapse">
        <h3 class="card-title">Nueva Empresa</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool ml-auto " >
            <personal-fab :active="active" />
          </button>
        </div>
      </a>

      <div id="collapseOne" class="panel-collapse in collapse" >
        <div class="card-body">

          <div class="form-group">
            <label>Nombre de la Empresa</label>
            <input v-model="name" class="form-control">
          </div>

          <div class="form-group">
            <label for="exampleInputFile">Logo de la Empresa</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" @change="uploadFile" class="custom-file-input" ref="SelectFile" id="InputFile">
                <label class="custom-file-label" for="InputFile">Seleccionar Archivo</label>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label>NIT de la Empresa</label>
            <input v-model="nit" class="form-control">
          </div>

          <div class="form-group">
            <label>Teléfono de la Empresa</label>
            <input v-model="phone" class="form-control">
          </div>

          <div class="form-group">
            <label>Web de la Empresa</label>
            <input v-model="web" class="form-control">
          </div>

        </div>

        <div class="card-footer">
            <button type="button" class="btn btn-outline-success" @click="submitNewCompany">Agregar</button>
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
        name:"",
        logo:null,
        nit:"",
        phone:"",
        web:"",
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

      submitNewCompany: function(){
        let fd= new FormData();
        fd.append("name", this.name);
        fd.append("logo", this.logo);
        fd.append("nit", this.nit);
        fd.append("phone", this.phone);
        fd.append("web", this.web);

        axios.post(baseUrl+'/api/company',fd)
        .then(res=>{
          console.log("RESPONSE FROM SERVER ",res);
          toastr.success("Compañía creada con éxito");
        })
        .catch(err=>{
          console.log("ERROR FROM SERVER ",err,err.response);
          toastr.error("Error al crear la compañía")
        });

      },
    }

}

</script>
