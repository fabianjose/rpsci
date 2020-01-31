<template>
    <div class="offer-card">
        <div class="offer-card-header">
            <img :src="baseUrl+'/images/logo.png'" alt="logo" class="col-10">
        </div>
        <div class="offer-card-separator bg-main-pink"></div>
        <div class="offer-card-content">
            <div class="row">
                <h6 class="col-12 offer-card-title">Nombre del Plan Super Especial Promocionado</h6>
            </div>
            <div class="row">
                <h5 class="col-12 offer-card-price">8.000 $</h5>
            </div>
        </div>
        <div class="offer-card-footer">
            <div class="col-10">
              <button class="btn btn-block bg-main-pink text-white offer-card-btn rounded-pill">
                  CONTACTAR
              </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            baseUrl:baseUrl,
        }
    }   
}
</script>