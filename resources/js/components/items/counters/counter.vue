<template>
    <div class="d-flex flex-column align-items-center">
        <h2 class="text-center text-white">{{counter.value}}</h2>
        <h6 class="text-center mt-2 text-sm text-white">{{counter.label}}</h6>
    </div>
</template>

<script>
export default {
    props:["counter"]
}
</script>