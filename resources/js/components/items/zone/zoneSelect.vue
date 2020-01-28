<template>
    <div class="d-flex w-100 flex-wrap">

      <slot></slot>

      <div v-if="!hideDepartment" :class="middle?'col-10':'form-group col-xl-6 col-lg-6 col-md-6 col-6'">
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

      <div v-if="!hideMunicipality" :class="middle?'col-10':'form-group col-xl-6 col-lg-6 col-md-6 col-6'">
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
    props:["middle", "hideDepartment", "hideMunicipality"],
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
            this.getMunicipalities();
        },

        async setMunicipality(val){
            await this.$emit("newMunicipality", val);
        },

        getMunicipalities(){
            axios.get(baseUrl+'/api/municipalities/'+this.department)
            .then(res=>{
                console.log(res);
                console.log(this.$refs);
                this.$refs.municipalitiesList.setEntries(res.data)
            }).catch(err=>{
                console.log("ERROR FROM SERVER ", err,err.response);
                toastr.error("error al cargar los municipios");
            });
        },
    },
}
</script>