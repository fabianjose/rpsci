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
              <offer-card :offer="offer" />
            </div>
          </template>
        </vueper-slide>
      </vueper-slides>

    </div>
</template>

<script>
export default {
  data(){
    return{
      offers: [],
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
      }
    };
  },
  mounted(){
    this.refreshData();
  },
  methods:{
    refreshData(){
      axios.get(baseUrl+'/api/offers/highlighted')
      .then(res=>{
        console.log('Offers: ',res);
        this.offers=res.data;
      }).catch(err=>{
        console.log("ERROR FROM SERVER ",err.response);
        if (err.response.data.errorMessage){
          toastr.error(err.response.data.errorMessage);
        }else{
          toastr.error('Error al obtener las ofertas destacadas');
        }
      });
    },
  }
}
</script>
