<template>
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-edit-category"
  aria-hidden="true" id="modalEditPlan">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-white">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <slot></slot>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" @click="editPlan" :disabled="waitResponse">Save changes</button>
      </div>
    </div>
  </div>
</div>
</template>

<script>
    export default {
        
    }
</script>
