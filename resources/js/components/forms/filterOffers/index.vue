<template> 
  <div class="card card-primary filter-card mb-5">
    <div class="card-body d-flex flex-column align-items-center pt-4">
      <h5 class="filter-card-title font-weight-bold text-center">
        <i class="fas fa-filter" style="color:#606060"></i>Filtro de búsqueda</h5> <br>
<div class="form-horizontal my-2 col-12 flex-wrap" >
  <div  type="button" data-toggle="collapse" data-target="#collapseProveedor" aria-expanded="false" aria-controls="collapseProveedor" style="display:flex;justify-content: space-between;">
  <h4 class="btn-block" style="color:#616161; font-family:'Work Sans'; font-weight: 500;">  Proveedor   </h4> <span><i class="fas fa-angle-down" style="margin-left: auto; font-size: 33px;   color: #afaeb4;"></i></span>
</div>
<hr style="bcolor:#f7f7f7">



<div class="collapse" id="collapseProveedor">
  <div class="card card-body" style="background-color: #f7f7f7;">
    <div v-for="(value) in providers">
      <input type="checkbox" :value="value.id" v-model="checked_providers">
       <label style="font-weight: lighter;  font-family: 'Heebo';" >{{value.name}}</label>
    </div>
  </div>
</div>
</div>

<div class="form-horizontal my-2 col-12 flex-wrap">
<div  type="button" data-toggle="collapse" data-target="#collapseTecnologia" aria-expanded="false" aria-controls="collapseTecnologia"  style="display:flex;justify-content: space-between;">
 <h4 class="btn-block" style="color:#616161; font-family:'Work Sans'; font-weight: 500;">  Tecnología   </h4> <span><i class="fas fa-angle-down" style="margin-left: auto; font-size: 33px;   color: #afaeb4;"></i></span>    
 
</div>
  <hr>
<div class="collapse" id="collapseTecnologia">
  <div class="card card-body">
        <div v-for="(value) in technologies">

       
      <input type="checkbox" :value="value.value" v-model="checked_technologies">
      <label>{{value.value}}</label>
    </div>
  </div>
</div>
</div>

<div class="form-horizontal my-2 col-12 flex-wrap">
  <div type="button" data-toggle="collapse" data-target="#collapseVelocidad" aria-expanded="false" aria-controls="collapseVelocidad" style="display:flex;justify-content: space-between;">
 <h4 class="btn-block" style="color:#616161; font-family:'Work Sans'; font-weight: 500;">  Velocidad   </h4> <span><i class="fas fa-angle-down" style="margin-left: auto; font-size: 33px;   color: #afaeb4;"></i></span>
  </div>
</p><hr>
<div class="collapse" id="collapseVelocidad">
  <div class="card card-body">
        <div v-for="(value) in speeds">

      <input type="checkbox" :value="value.value" v-model="checked_speeds">
       <label>{{value.value}}</label>
    </div>
  </div>
</div>
</div>

<div class="form-horizontal my-2 col-12 flex-wrap" >
  <div  type="button" data-toggle="collapse" data-target="#collapsePrecio" aria-expanded="false" aria-controls="collapseExample" style="display:flex;justify-content: space-between;">
 <h4 class="btn-block" style="color:#616161">  Precio   </h4> <span><i class="fas fa-angle-down" style="margin-left: auto; font-size: 33px;   color: #afaeb4;"></i></span>

  </div>
</p><hr>
<div class="collapse" id="collapsePrecio">
  <div class="card card-body">
   <div class="row">
     <div class="col">
        <span>{{min_price}} </span>
     </div>
     <div class="col">
       <span style="">{{parseFloat(parserFloat)}}</span> 
     </div>
   </div>
    
  <vue-slider
  
      v-model="value"
      :order="true"
      :min="min_price"
      :max="max_price"
      :interval="1"
      :tooltip-formatter="formatter2"
    > </vue-slider>
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
      </div>
    </div>

   
  <div data-role="main" class="ui-content">


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
      checked_providers:[],
      value: [0,100000],
      formatter2: v => `$${('' + (v)).replace(/\B(?=(\d{3})+(?!\d))/g, ',')}`
    }
  },

  methods:{
    emitFilter(){
      //console.log(max_price);
     // return;
      let searchKey="";
      if(this.orderBy){
        searchKey+="&sortBy="+this.orderBy;
        if(this.orderBySort=="desc") searchKey+="&sortByDesc=true";
      }
      if(this.value[0]&&this.value[1]!=""){
        if(!isNaN(this.value[0])) searchKey+="&from="+parseFloat(this.value[0]);
        if(!isNaN(this.value[1])) searchKey+="&to="+parseFloat(this.value[1]);
    //    else return toastr.error("El campo 'Desde' es de valor numérico")
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
