<template>
    <div class="d-flex justify-content-center contacto-main-content">
		<div class="card card-primary contacto-card bg-light p-3 col-10 col-sm-10 col-md-10 col-lg-6 col-xl-6">
            <div class="card-body d-flex flex-column align-items-center pt-4">
            <h5 class="contacto-card-title font-weight-bold text-center">Ponte en contacto con nosotros</h5>
            <div class="d-flex flex-column w-100 py-3">
                <div class="form-group my-2">
                <input type="text" class="form-control rounded-pill" placeholder="Nombre y Apellido">
                </div>
                        <div class="d-flex w-100 flex-wrap px-0">
                            <div class="form-group my-2 col-md-6 col-12 pl-0 pr-md-1 pr-0">
                                <input type="text" class="form-control rounded-pill" placeholder="Correo Electronico">
                            </div>
                            <div class="form-group my-2 col-md-6 col-12 pr-0 pl-md-1 pl-0">
                                <input type="text" class="form-control rounded-pill" placeholder="No. Teléfono">
                            </div>
                        </div>
                        <div class="form-group my-2">
                <input type="text" class="form-control rounded-pill" placeholder="Departamento">
                </div>
                        <div class="form-group my-2">
                <input type="text" class="form-control rounded-pill" placeholder="¿Donde nos encontró?">
                </div>
                        <div class="form-group my-2">
                            <textarea rows="8" class="form-control w-100" placeholder="Mensaje..."></textarea>
                        </div>
            </div>
            </div>
            <div class="card-footer d-flex justify-content-end pt-2 pb-5 bg-light">
            <div class="col-lg-4 col-md-6 col-sm-8">
                <i class="fa fa-search icon-btn"></i>
                <button class="btn btn-block btn-dark-blue rounded-pill text-center">
                Enviar
                </button>
            </div>
            </div>
	  </div>
      <div class="col-10 col-sm-10 col-md-10 col-lg-6 col-xl-6 d-flex flex-column p-4 align-items-center">

        <h5 class="contacto-card-title font-weight-bold text-center">Ubícanos</h5>
        
        <GmapMap
            :center="{lat:4.613033, lng:-74.144560}"
            :zoom="17"
            map-type-id="roadmap"
            style="width: 90%; height: 300px"
        >
        <GmapMarker
            :position="{lat:4.613033, lng:-74.144560}"
            :clickable="false"
            :draggable="false"
        />
        </GmapMap>
      </div>
	</div>
</template>

<script>
export default {
    
}
</script>