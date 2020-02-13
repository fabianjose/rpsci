<template>
  <div class="col-md-6 col-lg-4 col-sm-8">
    <div class="card card-primary">
      <div class="card-body d-flex flex-column align-items-center">
        <img class="image-logo-banner" :src="baseUrl+'/storage/'+logo">
        <h4 class="px-2 mt-3 text-dark card-text text-capitalize">{{title}}</h4>
        <h6 class="px-2 mt-1 text-dark card-text text-capitalize">{{company}}</h6>
        <p v-if="this.highlighted" :class="'px-2 mt-1 card-text'+getDaysClass()">Expira en: {{getExpiration()}}</p>
      </div>
      <div class="card-footer">
        <div class="card-tools row justify-content-around">
          <div v-if="pick" class="btn btn-success rounded-circle text-lg icon-btn-sm" @click="emitPick">
            <i class="fas fa-plus"></i>
          </div>
          <div class="btn btn-info rounded-circle text-lg icon-btn-sm" @click="emitView" data-toggle="modal" data-target="#modalViewOffer">
            <i class="fas fa-eye"></i>
          </div>
          <div v-if="!pick&&!remove&&!highlighted" class="btn btn-success rounded-circle text-lg icon-btn-sm" @click="emitEdition" data-toggle="modal" data-target="#modalEditOffer">
            <i class="fas fa-edit"></i>
          </div>
          <div v-if="!pick" class="btn btn-danger rounded-circle text-lg icon-btn-sm" @click="emitRemove">
            <i class="fas fa-trash"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    props:["title", "logo", "index", "company", "remove", "pick", "highlighted", "highlightExpiration","notUpdate"],

    data(){
        return {
            baseUrl:baseUrl,
        }
    },

    methods:{
        getDaysClass(){
          let daysRemaining=this.getDays();
          return daysRemaining>5?' text-info':' text-danger';
        },
        getDays(){
          let Expiration= (this.highlightExpiration.split(' ')[0]).split('-');

          console.log('expiration date : ', Expiration);

          let date1 = new Date(Expiration[0], parseInt(Expiration[1])-1, Expiration[2]);
          let date2 = new Date();

          console.log("dates : ",date1, " and ", date2 )

          // To calculate the time difference of two dates
          let TimeDifference = date1.getTime() - date2.getTime();

          console.log("time difference : ", TimeDifference )


          // To calculate the no. of days between two dates
          let DaysDifference = TimeDifference / (1000 * 3600 * 24);

          console.log("days difference : ", DaysDifference);

          return parseInt(DaysDifference);
        },
        getExpiration(){
          let daysRemaining=this.getDays();
          return daysRemaining+' '+(daysRemaining>1?'días':'día');
        },
        emitView(){
            this.$emit('view', this.index)
        },
        emitEdition(){
            this.$emit('edit', this.index)
        },
        emitRemove(){
            this.$emit('delete', this.index)
        },
        emitPick(){
            this.$emit('pick', this.index);
        }
    }
}
</script>
