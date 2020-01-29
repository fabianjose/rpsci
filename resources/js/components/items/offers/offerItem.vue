<template>
  <li class="list-group-item d-flex justify-content-between flex-wrap">
    <h5 class="px-2 mt-2 card-text text-capitalize" style="color: #006494;">{{title}} - {{company}}</h5>
    <div class="btn-group flex-wrap">
      <button type="button" class="btn btn-app rounded mx-1" @click="emitView" data-toggle="modal" data-target="#modalViewOffer">
        <i class="fas fa-eye"></i>
      </button>
      <button v-if="!pick&&!remove&&!highlighted" type="button" class="btn btn-app rounded mx-1" @click="emitEdition" data-toggle="modal" data-target="#modalEditOffer">
        <i class="fas fa-edit"></i>
      </button>
      <button v-if="!pick" type="button" class="btn btn-app rounded mx-1" @click="emitRemove">
        <i class="fas fa-trash"></i>
      </button>
    </div>
  </li>
</template>

<script>
export default {
  props:["title", "logo", "index", "company", "remove", "pick", "highlighted", "highlightExpiration"],
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
