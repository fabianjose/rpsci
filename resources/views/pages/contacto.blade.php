@extends("layouts.landing")

@section("content-page")
<div class="d-flex flex-column contacto-main w-100">
	<div class="d-flex justify-content-end align-items-end w-100 contacto-title p-5">
		<div class="">
			<h2 class="text-uppercase font-weight-bold text-white contacto-title-text">Estamos</h2>
			<h2 class="text-uppercase font-weight-bold text-white contacto-title-text">Para</h2>
			<h2 class="text-uppercase font-weight-bold text-white contacto-title-text">Servirte</h2>
		</div>
	</div>
	<div class="d-flex justify-content-center contacto-main-content">
		<div class="card card-primary contacto-card bg-light p-3">
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
	</div>
	<div class="d-flex contacto-footer flex-wrap w-100 p-5 mt-5">
		<div class="col-md-6 col-12">
			<h4 class="font-weight-bold contacto-footer-title text-uppercase">
				También puedes comunicarte con nosotros a través de:
			</h4>
		</div>
		<div class="col-md-6 col-12 d-flex flex-column align-items-end">
			<div class="my-2 d-flex flex-column align-items-end">
				<span class="text-lg">Correo Electronico</span>
				<span class="text-md">info@dominio.com</span>
			</div>
			<div class="my-2 d-flex flex-column align-items-end">
				<span class="text-lg">Numero de Telefono</span>
				<span class="text-md">+55 121 4545 7878</span>
			</div>
		</div>
	</div>
</div>
@stop
