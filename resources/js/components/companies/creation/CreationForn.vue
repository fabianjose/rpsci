<template>
    <div class="card card-success" id="createCompanyAccordion">
      <a class="card-header collapsed" data-parent="#createCompanyAccordion" href="#collapseOne" aria-expanded="false" data-toggle="collapse">
        <h3 class="card-title">Nueva Empresa</h3>
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
                <input type="file" v-on:change="uploadFile" class="custom-file-input" ref="SelectFile" id="InputFile">
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
            <button type="button" class="btn btn-outline-success" v-on:click="submitNewCompany()">Agregar</button>
        </div>
      </div>
    </div>    
</template>

<script>
export default {
    name: 'companyCreation',

    data(){
      return {
        name:"",
        logo:null,
        nit:"",
        phone:"",
        web:"",
      }
    },

    mounted(){
      console.log("mounted");
    },

    methods:{

      uploadFile(){

        console.log("changing file")
        let uploadFile=this.$refs.SelectFile.files[0]
        
        if(!uploadFile){
          console.log("there is no file to attach")
          return;
        }

        this.logo=uploadFile;

      },

      submitNewCompany(){

        let fd= new FormData();

        fd.append("name", this.name);
        fd.append("logo", this.logo);
        fd.append("nit", this.nit);
        fd.append("phone", this.phone);
        fd.append("web", this.web);

        axios.post('http://127.0.0.1:8000/api/company',fd)
        .then(res=>{

          
          console.log("RESPONSE FROM SERVER ",res);
          
          }
        )
        .catch(err=>{
          
          
          console.log("ERROR FROM SERVER ",err);


          }
        );

      },
    }

}

</script>


