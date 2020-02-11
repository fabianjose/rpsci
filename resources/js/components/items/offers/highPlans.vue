<template>
    <div class="high-plans py-5 px-4">
      <div class="d-flex w-100 justify-content-center mt-3">
        <h4 class="high-plans-color high-plans-title">Planes destacados</h4>
      </div>
      <vueper-slides
        class="no-shadow high-plans-carousel text-center w-100"
        ref="plansSlider"
        :bullets="false"
        :autoplay="autoplay"
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
      autoplay: false,
      breakpoints:{
        1200: {
          visibleSlides:3,
          slideRatio:0.55
        },
        900: {
          visibleSlides:2,
          slideRatio:0.65
        },
        750: {
          visibleSlides:2,
          slideRatio:0.75,
        },
        600: {
          visibleSlides: 1,
          slideRatio:0.9,
          autoplay: true
        },
        520: {
          visibleSlides: 1,
          slideRatio:1,
          autoplay: true
        },
        470: {
          visibleSlides:1,
          slideRatio:1.2,
          arrows: false,
          autoplay: true
        },
        400: {
          visibleSlides:1,
          slideRatio:1.3,
          arrows: false,
          autoplay: true
        },
        370: {
          visibleSlides:1,
          slideRatio:1.45,
          arrows: false,
          autoplay: true
        },
        355: {
          visibleSlides:1,
          slideRatio:1.55,
          arrows: false,
          autoplay: true
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
    // this.$refs.plansSlider.pauseAutoplay();
    // this.$refs.plansSlider.resumeAutoplay();
    // console.log($(document).height());
    // console.log($(document).width());

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
        if ($(document).width() <= 760) {
          if (this.offers.length > 1) {
            this.autoplay = true;
          }
        }else {
          if (this.offers.length > 3) {
            this.autoplay = true;
          }
        }
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
