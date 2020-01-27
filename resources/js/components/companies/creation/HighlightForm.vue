<template>
    <div class="card card-info" id="highlightCompanyAccordion">
      <a class="card-header collapsed" @click="active=!active" data-parent="#highlightCompanyAccordion" href="#collapseOne" aria-expanded="false" data-toggle="collapse">
        <h3 class="card-title">Destacar Empresa</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool ml-auto " >
            <personal-fab :active="active" />
          </button>
        </div>
      </a>

      <div id="collapseOne" class="panel-collapse in collapse" >
        <div class="card-body">
          <div class="form-group">
              <label>Empresa</label>
              <autocomplete-vue
              v-model="company"
              url="/api/companies"
              requestType="get"
              placeholder="Empresa"
              property="name"
              :required="true"
              :threshold="1"
              inputClass="form-control"
              ></autocomplete-vue>
          </div>
          <div class="form-group">
              <label>Fecha de expiracion</label>
              <!-- <input type="text" class="form-control" placeholder="YYYY/MM/DD" v-model="expiration"> -->
              <datetimepicker format="YYYY-MM-DD H:i:s" v-model="expiration"></datetimepicker>
          </div>
        </div>

        <div class="card-footer">
          <button type="button" class="btn btn-outline-success" @click="highlightCompany">Destacar</button>
        </div>
      </div>
    </div>
</template>

<script>
export default {
    data(){
      return {
        active:false,
        company:"",
        expiration:null,
      }
    },

    mounted(){
    },
    methods:{
      highlightCompany(){
        let fd= new FormData();
        fd.append("highlighted_expiration", this.expiration);
        fd.append("_method", 'put');
        axios.post(baseUrl+'/api/company/'+this.company+'/highlight',fd)
        .then(res=>{
          console.log("RESPONSE FROM SERVER ",res);
          toastr.success("Empresa destacada con éxito");
          this.$emit('refresh');
        })
        .catch(err=>{
          console.log("ERROR FROM SERVER ",err.response);
          if (err.response.status == 500){
            toastr.error('Error interno del servidor');
          }else if (err.response.status == 404) {
            toastr.error(err.response.statusText);
          }else {
            var allErrors = err.response.data;
            console.log(allErrors);
            var errorkeys = ['highlighted_expiration'];
            for (var errorkey of errorkeys) {
              if (allErrors[errorkey]){
                for (var error of allErrors[errorkey]) {
                  toastr.error(error);
                }
              }
            }
          }

        });
      },
    }

}

</script>
