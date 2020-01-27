<template>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    <h5 class="px-2 mt-2 text-dark card-text text-capitalize">{{title}}</h5>
    <div class="btn-group">
      <button type="button" class="btn btn-app rounded mx-1 text-sm btn-sm" @click="emitView" data-toggle="modal" data-target="#modalViewService">
        <i class="fas fa-eye"></i>
      </button>
      <button type="button" class="btn btn-app rounded mx-1 text-sm btn-sm" @click="emitEdition" data-toggle="modal" data-target="#modalEditService">
        <i class="fas fa-edit"></i>
      </button>
      <button type="button" class="btn btn-app rounded mx-1 text-sm btn-sm" @click="emitRemove">
        <i class="fas fa-trash"></i>
      </button>
    </div>
  </li>
  <!-- <div class="col-sm-6 col-md-4 col-lg-3">
    <div class="card card-primary">
      <div class="card-body d-flex flex-column align-items-center">
      </div>
      <div class="card-footer">
        <div class="card-tools row justify-content-around">
        </div>
      </div>
    </div>
  </div> -->
</template>

<script>
export default {
    props:["title", "index"],

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
