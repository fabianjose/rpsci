<template>
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Nueva Empresa</h3>
        </div>
        
        <div class="card-body">
          <div class="form-group">
            <label>Nombre de la Empresa</label>
            <input class="form-control">
          </div>

          <div class="form-group">
            <label for="exampleInputFile">Logo de la Empresa</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" ref="SelectFile" id="InputFile">
                <label class="custom-file-label" for="InputFile">Seleccionar Archivo</label>
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <label>NIT de la Empresa</label>
            <input class="form-control">
          </div>

          <div class="form-group">
            <label>Teléfono de la Empresa</label>
            <input class="form-control">
          </div>

          <div class="form-group">
            <label>Web de la Empresa</label>
            <input class="form-control">
          </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Agregar</button>
        </div>

    </div>    
</template>

<script>
export default {
    name: 'companyCreation',    
}
</script>


