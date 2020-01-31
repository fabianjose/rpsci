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
          :slide-ratio="1 / 3"
          :dragging-distance="70"
          :breakpoints="breakpoints">
          <vueper-slide v-for="i in 9" :key="i" :title="i.toString()">
            <template v-slot:content>
              <div class="h-100 bg-dark mx-2">

              </div>
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
            breakpoints:[
            {
            1200: {
              visibleSlides:3,
              slideRatio:1 / 3
            },
            900: {
              visibleSlides:2,
              slideRatio:1 / 2.5
            },
            750: {
              visibleSlides:2,
              slideRatio:1 / 2,
            },
            600: {
              visibleSlides: 2,
              slideRatio:1 / 1.5
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
        ]
        };
    }
}
</script>