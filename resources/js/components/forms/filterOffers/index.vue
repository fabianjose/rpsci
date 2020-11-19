<template>

<div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Collapsible Group Item #1
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Collapsible Group Item #2
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Collapsible Group Item #3
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>





  
  <div class="card card-primary filter-card mb-5">
    <div class="card-body d-flex flex-column align-items-center pt-4">
      <h5 class="filter-card-title font-weight-bold text-center">Filtra tu búsqueda</h5>
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

  props:["fields"],

  data(){
    return{
      orderBy:"tariff",
      fromPrice:null,
      toPrice:null,
      orderBySort:"desc",
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

      if(this.toPrice&&this.toPrice!=""){
        
        if(!isNaN(this.toPrice)) searchKey+="&to="+parseFloat(this.toPrice);

        else return toastr.error("El campo 'Hasta' es de valor numérico")
        
      }

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
