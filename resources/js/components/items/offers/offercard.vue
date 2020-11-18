<template>
  <div class="offer-card d-flex flex-column">
    <div class="offer-card-header">
      <img :src="baseUrl+'/storage/'+offer.company_logo" alt="logo" class="h-100 ">
    </div>
    <div :class="'offer-card-separator '+(index%2?'bg-main-blue':'bg-main-pink')"></div>

    <div class="offer-card-content">
      <div class="row" style="    padding-left: 30px;  padding-right:30px; margin-top: -12px;">
       <!-- <h6 class="col-12 offer-card-title">{{offer.company_name}}</h6> -->
       <h6 class="col-12 offer-card-title">Fibra Optica</h6>       
      </div>
      <div class="row text-center">
       <!--  <h6 class="col-12 offer-card-benefits text-wrap" style="font-family:heebo">{{offer.benefits}}</h6>-->
        <p class="col-12" style="font-family: 'Heebo';    margin-top: -9px; color:#88868b">velocidad</p>
        <!-- <h6 class="col-12 offer-card-title">{{offer.company_name}}</h6>  ACA VA EL VALOR DE LA VELOCIDAD -->
        <h1 class="col-12 " style="font-family: 'Heebo';    color: #5b5b5f;    margin-top: -18px;">30 Mbps</h1>
      </div> 
          <div :class="'offer-card-separator '+(index%2?'bg-main-blue':'bg-main-pink')"></div>

            <div class="row text-center">
       <!--  <h6 class="col-12 offer-card-benefits text-wrap" style="font-family:heebo">{{offer.benefits}}</h6>-->
        <p class="col-12 " style="font-family: 'Heebo';    color:#88868b">Cantidad de Canales</p>
        <!-- <h6 class="col-12 offer-card-title">{{offer.company_name}}</h6>  ACA VA EL VALOR DE CANALES DE BASE DEDATOS -->
        <h1 class="col-12 " style="font-family: 'Heebo';    color: #5b5b5f;     margin-top: -19px;    ">174 Canales</h1>
      </div> 

         <div :class="'offer-card-separator '+(index%2?'bg-main-blue':'bg-main-pink')"></div>

            <div class="row text-center">
       <!--  <h6 class="col-12 offer-card-benefits text-wrap" style="font-family:heebo">{{offer.benefits}}</h6>-->
        <p class="col-12 " style="font-family: 'Heebo';    color:#88868b">Telefonia</p>
        <!-- <h6 class="col-12 offer-card-title">{{offer.company_name}}</h6>  ACA VA EL VALOR DE CANALES DE BASE DEDATOS -->
        <h1 class="col-12 " style="font-family: 'Heebo';    color: #5b5b5f;     margin-top: -19px;  ">ILIMITADA</h1>
      </div> 
        <div class="row"  style="    padding-left: 30px;  padding-right:30px; margin-top: ;">
             <h6 class="col-12 offer-card-title">descuento del 50% 4 meses</h6>  
        </div>
                  
    <p class="col-12 " style="font-family: 'Heebo';    color:#88868b">Desde</p>

      <div class="row" >
        <h5 class="col-12 offer-card-price" >$ {{showPrice(offer.tariff)}}</h5>
      </div>
    </div>
    <div class="offer-card-footer">
      <div class="col-10">
        <div>
  <button @click="emitContact" data-toggle="modal" data-target="#modalConsultOffer" 
          :class="'btn  text-white offer-card-btn rounded-pill '+(index%2?'bg-main-blue':'bg-main-pink')">
          ADQUIÉRELO
        </button>
        </div>
      
      </div>
    </div>
  </div>



  
</template>


<script>
export default {
  props:['offer','index'],
  data(){
    return{
      baseUrl:baseUrl,
    }
  },

  methods:{
    showPrice(price){
        return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    },
    emitContact(){
      this.$emit("contactOffer",this.index);
    }
  }
}
</script>
