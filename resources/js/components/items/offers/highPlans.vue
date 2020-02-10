<template>
    <div class="high-plans py-5 px-4">
      <div class="d-flex w-100 justify-content-center mt-3">
        <h4 class="high-plans-color high-plans-title">Planes destacados</h4>
      </div>
      <vueper-slides
        class="no-shadow high-plans-carousel text-center w-100"
        :bullets="false"
        :autoplay="(offers.length < 3)?false:true"
        :duration="3000"
        :visible-slides="(offers.length < 3)?offers.length:3"
        :slide-ratio="0.4"
        :dragging-distance="70"
        :arrows="false"
        :breakpoints="breakpoints" >
        <vueper-slide v-for="(offer,index) in offers" :key="index" class="align-self-center">
          <template v-slot:content>
            <div class="d-flex text-center justify-content-center">
              <offer-card @contactOffer="contactOffer" :index="index" :offer="offer" />
            </div>
          </template>
        </vueper-slide>
      </vueper-slides>

        <offer-consult v-if="currentOffer&&consultMode" :offer="currentOffer"></offer-consult>

    </div>
</template>

<script>
export default {
  data(){
    return{
      currentOffer:null,
      latLng:"",
      offers: [],
      consultMode:false,
      breakpoints:{
        1200: {
          visibleSlides:3,
          slideRatio:0.5
        },
        900: {
          visibleSlides:2,
          slideRatio:0.6
        },
        750: {
          visibleSlides:2,
          slideRatio:0.7,
        },
        600: {
          visibleSlides: 1,
          slideRatio:0.8,
        },
        520: {
          visibleSlides: 1,
          slideRatio:0.9,
        },
        380: {
          visibleSlides:1,
          slideRatio:1,
          arrows: false
        }
      },
      locationDenied:false,
      
      department:null,
      municipality:null,
      
      defaultDepartment:"bogota",
      defaultMunicipality:"bogota",

      apiKey:"AIzaSyBL0ZT5AWyMHUGkuGVuSbqHwZx_3dr6MU0",
    };
  },
  mounted(){
    this.initGeo();
  },
  methods:{
    initGeo(){

        navigator.geolocation.getCurrentPosition(location=>{
          console.log("location ", location);
          this.latLng="&latlng="+location.coords.latitude;
          this.latLng+=","+location.coords.longitude;
          this.callGmap();
        },err=>{
          console.log("error ", err)
          this.locationDenied=true;
          //this.department=""
          this.refreshData();
        },{timeout:10000})
      
    },

    callGmap(){

      fetch("https://maps.googleapis.com/maps/api/geocode/json?key="+this.apiKey+this.latLng,{_method:"get"})
      .then(res=>{
        return res.json();
      })
      .then(async res => {
        console.log(res)

        this.department= await res.results[0].address_components.find(ad=>ad.types.indexOf("administrative_area_level_1")!=-1).long_name;
        
        if(this.department?false:true){
          this.refreshDefault()
        }

        this.municipality= await res.results[0].address_components.find(ad=>ad.types.indexOf("locality")!=-1).long_name;

        if(this.municipality?false:true){
          this.municipality = this.department;
        }

        await this.refreshData()
        
      })
    },

    refreshData(){
      let fd= new FormData();
      fd.append("department", this.department?this.department:this.defaultDepartment)
      fd.append("municipality", this.municipality?this.municipality:this.defaultMunicipality)
      axios.post(baseUrl+'/api/offers/area/highlight', fd)
      .then(res=>{
        console.log('Offers: ',res);
        this.offers=res.data;
      }).catch(err=>{
        console.log("ERROR FROM SERVER ",err.response);
        if(err.response.status==404){
          this.refreshDefault()
        }
        if (err.response.data.errorMessage){
          toastr.error(err.response.data.errorMessage);
        }else{
          toastr.error('Error al obtener las ofertas destacadas');
        }
      });
    },
    contactOffer(index){
      this.consultMode=true;
      this.currentOffer=this.offers[index];
    },

    refreshDefault(){
      toastr.info("no se ha encontrado el departamento, mostrando planes destacados de la capital"); 
      this.department=null;
      this.municipality=null;
      this.refreshData();
    }
  }
}
</script>

<style>
</style>
