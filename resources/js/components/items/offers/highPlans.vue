<template>
    <div class="high-plans py-5 px-4">
      <div class="d-flex w-100 justify-content-center mt-3">
        <h4 class="high-plans-color high-plans-title">Planes destacados</h4>
      </div>
      <div class="d-flex w-100 justify-content-center mt-5">
        <vueper-slides
          class="no-shadow high-plans-carousel"
          :bullets="false"
          :visible-slides="3"
          :slide-ratio="1"
          :dragging-distance="70"
          :arrows="false"
          :breakpoints="breakpoints"
          >
          <vueper-slide v-for="i in 9" :key="i" :title="i.toString()">
            <template v-slot:content>
              <offer-card></offer-card>
            </template>
          </vueper-slide>
        </vueper-slides>
      </div>

    </div>
</template>

<script>
export default {
    data(){
        return{
            breakpoints:
            {
            1200: {
              visibleSlides:3,
              slideRatio:1
            },
            900: {
              visibleSlides:2,
              slideRatio:1
            },
            750: {
              visibleSlides:2,
              slideRatio:1,
            },
            600: {
              visibleSlides: 2,
              slideRatio:1,
            },
            520: {
              visibleSlides: 1,
              slideRatio:1,
            },
            380: {
              visibleSlides:1,
              slideRatio:1,
              arrows: false
            }
            }
        };
    }
}
</script>