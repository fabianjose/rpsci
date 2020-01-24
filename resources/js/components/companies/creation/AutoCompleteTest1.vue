<template>
  <div class="card card-success" id="test1">
    <a class="card-header collapsed" data-parent="#test1" href="#collapseOne" aria-expanded="false" data-toggle="collapse">
      <h3 class="card-title">Prueba</h3>
    </a>
    <div id="collapseOne" class="panel-collapse in collapse" >
      <div class="card-body">
        <autocomplete-vue
        v-model="selected"
        url="/api/companies"
        requestType="get"
        property="name"
        :required="true"
        :threshold="1"
        ></autocomplete-vue>
      </div>
      <div class="card-footer">
        <span>{{selected}}</span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data(){
    return {
      selected: ''
    }
  },

  mounted(){
    // console.log(this.$http);
  },
  methods:{
  }

}

</script>
