@extends("layouts.landing")

@section("content-page")
<div class="d-flex flex-column nosotros-main w-100">
	<div class="d-flex justify-content-end align-items-end w-100 nosotros-title p-5">
		<h2 class="text-uppercase font-weight-bold text-white nosotros-title-text">Nosotros</h2>
	</div>
	<div class="d-flex flex-column nosotros-main-content p-4 align-items-center">
		<h4 class="mision-title my-4">¿QUÉ HACEMOS?</h4>
		<div class="d-flex justify-content-center mision-content">
			<span class="text-justify px-4">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
				Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
				Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</span>
		</div>
		<h4 class="mision-title mt-5 mb-4">MISIÓN</h4>
		<div class="d-flex justify-content-center mision-content mb-3">
			<span class="text-justify px-4 text-wrap">
				Facilitar a todos los hogares y empresas Colombianas la búsqueda del mejor proveedor en telecomunicaciones, posicionándonos como la plataforma web más buscada para la solución de conectividad a nivel nacional. 
			</span>
		</div>
		<h4 class="mision-title mt-5 mb-4">VISION</h4>
		<div class="d-flex justify-content-center mision-content mb-3">
			<span class="text-justify px-4 text-wrap">
				Posicionarnos como la plataforma web más utilizada a nivel global, siendo el metabuscador más rentable, generando a nuestros usuarios la facilidad de encontrar el mejor proveedor de telecomunicaciones, sin importar el lugar del mundo en el que se encuentre.  
			</span>
		</div>
	</div>
	<div class="d-flex flex-column nosotros-services-bg p-4 align-items-center">
		<h4 class="nosotros-services-title my-2">SERVICIOS OFRECIDOS</h4>
		<div class="d-flex flex-wrap justify-content-center mt-4 p-4">
			<div class="col-xl-4 col-lg-4 col-md-6 col-12 d-flex align-items-center justify-content-center">
				<img src="{{url('images/service-1.png')}}" class="img-nosotros-services">
				<div class="pl-2 d-flex flex-column">
					<span class="text-uppercase font-weight-bold text-white">Banda Ancha</span>
					<button type="button" class="btn rounded-pill text-uppercase nosotros-service-text text-sm nosotros-service-btn">Ver Ofertas</button>
				</div>
			</div>
			<div class="col-xl-4 col-lg-4 col-md-6 col-12 d-flex align-items-center justify-content-center">
				<img src="{{url('images/service-2.png')}}" class="img-nosotros-services">
				<div class="pl-2 d-flex flex-column">
					<span class="text-uppercase font-weight-bold text-white">Banda Ancha</span>
					<button type="button" class="btn rounded-pill text-uppercase nosotros-service-text text-sm nosotros-service-btn">Ver Ofertas</button>
				</div>
			</div>
			<div class="col-xl-4 col-lg-4 col-md-6 col-12 d-flex align-items-center justify-content-center">
				<img src="{{url('images/service-3.png')}}" class="img-nosotros-services">
				<div class="pl-2 d-flex flex-column">
					<span class="text-uppercase font-weight-bold text-white">Fibra Optica</span>
					<button type="button" class="btn rounded-pill text-uppercase nosotros-service-text text-sm nosotros-service-btn">Ver Ofertas</button>
				</div>
			</div>
			<div class="col-xl-4 col-lg-4 col-md-6 col-12 d-flex align-items-center justify-content-center">
				<img src="{{url('images/service-4.png')}}" class="img-nosotros-services">
				<div class="pl-2 d-flex flex-column">
					<span class="text-uppercase font-weight-bold text-white">Banda Ancha</span>
					<button type="button" class="btn rounded-pill text-uppercase nosotros-service-text text-sm nosotros-service-btn">Ver Ofertas</button>
				</div>
			</div>
			<div class="col-xl-4 col-lg-4 col-md-6 col-12 d-flex align-items-center justify-content-center">
				<img src="{{url('images/service-5.png')}}" class="img-nosotros-services">
				<div class="pl-2 d-flex flex-column">
					<span class="text-uppercase font-weight-bold text-white">TV por Cable</span>
					<button type="button" class="btn rounded-pill text-uppercase nosotros-service-text text-sm nosotros-service-btn">Ver Ofertas</button>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
