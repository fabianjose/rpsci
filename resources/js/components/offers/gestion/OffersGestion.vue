<template>
<div class="container-fluid">
    <div class="row justify-content-center py-4">
        <div class="col-10 col-lg-12">
            <offer-creation></offer-creation>
        </div>
    </div>
    <h5 class="mt-4 mb-2 text-center">Ofertas Disponibles</h5>
    <div class="row justify-content-space-between py-4">

    </div>
</div>
</template>

<script>

export default {
  data(){
    return{
      baseUrl: baseUrl,
      offers:[],
    }
  },
  mounted(){
    this.refreshData();
  },
  methods:{
    refreshData(){
      axios.get(baseUrl+'/api/offers')
      .then(res=>{
        console.log(res.data);
        this.offers=res.data;
      }).catch(err=>{
        console.log(err.response);
      });
    },
    
  }
}

</script>
