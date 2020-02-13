<template>
    <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4">
        <div class="card card-primary">
            <div class="card-body d-flex flex-column align-items-center">
                <img class="img-fluid" style="max-height:135px;" :src="baseUrl+'/storage/'+logo" alt="">
                <h4 class="px-2 mt-3 text-dark-blue company-card-label card-text">{{title}}</h4>
            </div>
            <div class="card-footer">
                <div class="card-tools row justify-content-around">
                    <div class="btn btn-info rounded-circle text-lg icon-btn-sm" data-toggle="modal" data-target="#modalViewCompany" @click="emitView">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="btn btn-success rounded-circle text-lg icon-btn-sm" data-toggle="modal" data-target="#modalEditCompany" @click="emitEdition" v-if="!noEdit">
                        <i class="fas fa-edit"></i>
                    </div>
                    <div class="btn btn-danger rounded-circle text-lg icon-btn-sm" @click="emitRemove">
                        <i class="fas fa-trash"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:["title", "logo", "index", 'noEdit'],

    data(){
        return {
            baseUrl:baseUrl,
        }
    },

    methods:{
        emitView(){
            this.$emit('view', this.index)
        },
        emitEdition(){
            this.$emit('edit', this.index)
        },
        emitRemove(){
            this.$emit('delete', this.index)
        },
    }
}
</script>
