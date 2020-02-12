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
	<contact-main></contact-main>
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
