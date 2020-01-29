<template>
    <div class="d-flex w-100 flex-wrap">

      <slot></slot>

      <div v-if="!hideDepartment" :class="'form-group'+(middle?' col-10':' col-6')">
        <label>Departamento</label>
        <autocomplete-vue
        v-model="department"
        url="/api/departments"
        requestType="get"
        placeholder="Departamento"
        property="name"
        @selected="setDepartment"
        :required="true"
        :threshold="1"
        inputClass="form-control"
        ></autocomplete-vue>
      </div>

      <div v-if="!hideMunicipality" :class="'form-group'+(middle?' col-10':' col-6')">
        <label>Municipio</label>
        <autocomplete-vue
        ref="municipalitiesList"
        v-model="municipality"
        placeholder="Municipio"
        property="name"
        @selected="setMunicipality"
        :required="true"
        :threshold="1"
        inputClass="form-control"
        ></autocomplete-vue>
      </div>

    </div>
</template>

<script>
export default {
    props:["middle", "hideDepartment", "hideMunicipality", "noRequest"],
    data(){
        return {
            municipality:"",
            department:"",
        }
    },
    methods:{
        async setDepartment(val){
            console.log("new val ",val);
            await this.$emit("newDepartment",val);
            if(!this.noRequest)this.getMunicipalities();
        },

        async setMunicipality(val){
            await this.$emit("newMunicipality", val);
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
    },
}
</script>