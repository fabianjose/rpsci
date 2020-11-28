<template> 
  <div class="card card-primary filter-card mb-5">
    <div class="card-body d-flex flex-column align-items-center pt-4">
      <h5 class="filter-card-title font-weight-bold text-center">
        <i class="fas fa-filter"></i>Filtra tu búsqueda</h5>
<div class="form-horizontal my-2 col-12 flex-wrap">
  <h4 class="btn-block" type="button" data-toggle="collapse" data-target="#collapseProveedor" aria-expanded="false" aria-controls="collapseProveedor">
    Proveedor <span><i class="fas fa-angle-down" style="margin-left: auto;"></i></span>
  </h4> 

</p>
<div class="collapse" id="collapseProveedor">
  <div class="card card-body">
    <div v-for="(value) in providers">
       <label>{{value.name}}</label>
      <input type="checkbox" :value="value.id" v-model="checked_providers">
    </div>
  </div>
</div>
</div>
<div class="form-horizontal my-2 col-12 flex-wrap">
  <h4 class="" type="button" data-toggle="collapse" data-target="#collapseTecnologia" aria-expanded="false" aria-controls="collapseTecnologia">
    Tecnología  <span><i class="fas fa-angle-down"></i></span>
  </h4>
</p>
<div class="collapse" id="collapseTecnologia">
  <div class="card card-body">
        <div v-for="(value) in technologies">

       <label>{{value.value}}</label>
      <input type="checkbox" :value="value.value" v-model="checked_technologies">
    </div>
  </div>
</div>
</div>

<div class="form-horizontal my-2 col-12 flex-wrap">
  <h4 class="" type="button" data-toggle="collapse" data-target="#collapseVelocidad" aria-expanded="false" aria-controls="collapseVelocidad">
    Velocidad<span><i class="fas fa-angle-down"></i></span>
  </h4>
</p>
<div class="collapse" id="collapseVelocidad">
  <div class="card card-body">
        <div v-for="(value) in speeds">

       <label>{{value.value}}</label>
      <input type="checkbox" :value="value.value" v-model="checked_speeds">
    </div>
  </div>
</div>
</div>
<div class="form-horizontal my-2 col-12 flex-wrap">
  <h4 class="" type="button" data-toggle="collapse" data-target="#collapsePrecio" aria-expanded="false" aria-controls="collapseExample">
    Precio   <span><i class="fas fa-angle-down"></i></span>
  </h4>
</p>
<div class="collapse" id="collapsePrecio">
  <div class="card card-body">
  </div>
</div>
</div>
      <div class="d-flex flex-column w-100 py-3 px-1">
        <div class="d-flex flex-row w-100 justify-content-around flex-wrap">

          <div class="form-group my-2 col-12 ">
            <label for="orderBy" class="filter-card-label">Ordenar por:</label>
            <select class="custom-select " id="orderBy" v-model="orderBy">
              <option :value="'tariff'" selected >Precio</option>
              <option :value="'points'" selected >Puntuación</option>
              <option v-for="(field, k) in compFields" :key="k" :value="k+1" v-if="field.type=='numeric'" class="text-capitalize">{{field.name}}</option>
            </select>
          </div>
          <div class="form-group my-2 col-12 " v-if="orderBy">
            <label for="sortBy" class="filter-card-label">Orden:</label>
            <select class="custom-select " id="sortBy" v-model="orderBySort">
              <option :value="'asc'" selected >Ascendente</option>
              <option :value="'desc'" >Descendente</option>
            </select>
          </div>
        </div>
        <div class="form-horizontal my-2 col-12 flex-wrap">
          <span class="filter-card-label mb-2">Rango de precios</span>
          <div class="form-group d-flex flex-row my-2 flex-wrap">
            <div class="form-group has-search col-12 col-sm-6 col-md-6 my-2 col-lg-12 col-xl-12 d-flex align-items-center">
              <span class="fas fa-dollar-sign form-control-feedback "></span>
              <input class="form-control  rounded-input" placeholder="Desde" type="numeric" v-model="fromPrice">
            </div>
            <div class="form-group has-search col-12 col-sm-6 col-md-6 my-2 col-lg-12 col-xl-12 d-flex align-items-center">
              <span class="fas fa-dollar-sign form-control-feedback "></span>
              <input class="form-control rounded-input" placeholder="Hasta" type="numeric" v-model="toPrice">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer d-flex justify-content-center pb-4">
      <div class="col-lg-8 col-md-10 col-sm-10">
        <i class="fa fa-search icon-btn"></i>
        <button @click="emitFilter" class="btn btn-block btn-dark-blue ">
          Buscar
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {

  props:["fields","providers","max_price", "min_price","technologies","speeds"],

  data(){
    return{
      orderBy:"tariff",
      fromPrice:null,
      toPrice:null,
      orderBySort:"desc",
      checked_speeds:[],
      checked_technologies:[],
      checked_providers:[]

    }
  },

  methods:{
    emitFilter(){
 
      let searchKey="";
      if(this.orderBy){
        searchKey+="&sortBy="+this.orderBy;
        if(this.orderBySort=="desc") searchKey+="&sortByDesc=true";
      }
      if(this.fromPrice&&this.fromPrice!=""){
        if(!isNaN(this.fromPrice)) searchKey+="&from="+parseFloat(this.fromPrice);
        else return toastr.error("El campo 'Desde' es de valor numérico")
      }

     /* if(this.toPrice&&this.toPrice!=""){
        
        if(!isNaN(this.toPrice)) searchKey+="&to="+parseFloat(this.toPrice);

        else return toastr.error("El campo 'Hasta' es de valor numérico")
        
      }*/
      if(this.checked_technologies.lenght != 0){
        searchKey+="&technologies="+this.checked_technologies;
      }
      if(this.checked_speeds.lenght != 0){
        searchKey+="&speeds="+this.checked_speeds;
      }
      if(this.checked_technologies.lenght != 0){
        searchKey+="&providers="+this.checked_providers;
      }
      console.log(searchKey);
      this.$emit("customFiltering", searchKey);

    },
  },

  computed:{
    compFields:{
      get(){
        return this.fields;
      }
    }
  }

}
</script>
