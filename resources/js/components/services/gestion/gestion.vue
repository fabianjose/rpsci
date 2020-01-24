<template>
<div class="container-fluid">
    <div class="row justify-content-center py-4">
        <div class="col-10 col-lg-12">
            <service-creation @creatingDone="refreshData"></service-creation>
        </div>
    </div>
</div>
</template>

<script>

export default {

    data(){
        return{
           services:[]
        }
    },

    mounted(){
        this.refreshData();
    },

    methods:{
        refreshData(){
          axios.get(baseUrl+'/api/services')
          .then(res=>{
            console.log(res);
            this.companies=res.data;
          }).catch(err=>{
            console.log(err.response);
          });
        },
    }

}

</script>
