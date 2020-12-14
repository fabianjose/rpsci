@extends("layouts.landing")

@section("content-page")
<div>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active " >
      <img id="carrusel-img-1"  src="{{asset('images/fondo-carrusel-1.png')}}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img id="carrusel-img-2" src="{{asset('images/fondo-carrusel-2.png')}}" class="d-block w-100" alt="...">
    </div>
  
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


        <div class="main-section-bg" style="position:relative;background: transparent;margin-top:-15%;" >

            
            <div class="about-section" style="background: transparent;">
                <div class="d-flex flex-column about-sub p-3" style="padding-left: 100px;
    padding-right: 100px;">
                    <div class="fila-de-botones-sobre-buscador d-flex flex-row flex-wrap justify-content-center  text-heebo" >
                        <div class="botones-sobre-buscador col-6 col-sm-3 col-md-3 col-lg-3 p-2 my-2">
                            <div class="row align-items-start justify-content-center text-white">
                                <div class="rounded-circle about-number p-1 mb-1 text-center bg-dark-blue">1</div>
                                <p class="btn btn-1" class="col-12 col-md-8 col-lg-8 about-text  mt-1" class="texto-btn"  >
                                    
                                   Selecciona el uso
                                </p>
                            </div>
                        </div>
                        <div class="botones-sobre-buscador col-6 col-sm-3 col-md-3 col-lg-3 p-2 my-2">
                            <div class="row align-items-start justify-content-center text-white">
                                <div class="rounded-circle about-number p-1 mb-1 text-center bg-dark-blue">2</div>
                                <p class="btn btn-1" class="col-12 col-md-8 col-lg-8 about-text mt-1" class="texto-btn" >
                                    Selecciona el tipo de servicio
                                </p>
                            </div>
                        </div>
                        <div class="botones-sobre-buscador col-6 col-sm-3 col-md-3 col-lg-3 p-2 my-2">
                            <div class="row align-items-start justify-content-center text-white">
                                <div class="rounded-circle about-number p-1 mb-1 text-center bg-dark-blue">3</div>
                                <p class="btn btn-1" class="col-12 col-md-8 col-lg-8 about-text mt-1" class="texto-btn"  >
                                   Selecciona Departamento y Municipìo
                                </p>
                            </div>
                        </div>
                        <div class="botones-sobre-buscador col-6 col-sm-3 col-md-3 col-lg-3 p-2 my-2">
                            <div class="row align-items-start justify-content-center text-white">
                                <div class="rounded-circle about-number p-1 mb-1 text-center bg-dark-blue">4</div>
                                <p class="btn btn-1" class="col-12 col-md-8 col-lg-8 about-text  mt-1" class="texto-btn"   >
                                   Encuentra la Mejor Opción
                                </p>
                            </div>
                        </div>
                    </div>                
                    @if ($errors->any())
                    <search-form :errors="{{$errors}}"/>
                    @else
                    <search-form />
                    @endif
                    
                </div>
                <section class="contador1">
                <div class="bg-ic d-flex flex-row justify-content-around flex-wrap align-items-center" style="z-index:3">
                          <config-counters :counters="{{json_encode($configs)}}" class="col-10 col-sm-10 col-md-7 col-lg-7 col-xl-7"></config-counters>
                     </div>
                </section>
             
            </div>
            
            <section class="section-search mb-3" style="min-height: 500px; padding-top: 0%;margin-top: 0%;">
                
                    
                <div class=" justify-content-center container p-3" id="planes-destacados" >
                 <high-plans></high-plans>
             </div>
            </section>
            <section class="section-form formulario-centro" >
                       
                    <div class="row  justify-content-center  pb-5  " style="align-items: center;">
                        <div class="col-12 col-sm-3 text-center">
                            <h5 class="text-white text-ws texto-formulario-centro1" >Resolvemos todas tus <br> dudas en una llamada</h5>
                            <h2 class="text-white text-ws texto-formulario-centro2">¡Contáctanos!</h2>
                        </div>

                        <div class="col-12 col-sm-4 px-3">
                             <input id="text-form" class="form-control mt-1  p-2"  type="text" name="" placeholder="Nombre"/>
                             <input id="text-form"  class="form-control  mt-1 p-2" type="text" name="" placeholder="Celular"/>
                             <input id="text-form"  class="form-control  mt-1 p-2" type="text" name="" placeholder="Email"/>
                        </div>
                        <div class="col-12 col-sm-3">
                            <button id="btn-enviar" class="btn text-white" style="background: rgb(13,217,244);font-size: 25px;">ENVIAR</button>
                        </div>
                    </div>

                
            </section>

            <section class="contador2" style="margin-top: 0px;">
                <div class="bg-ic2 d-flex flex-row justify-content-around flex-wrap align-items-center" style="z-index:3">
                          <config-counters :counters="{{json_encode($configs)}}" class="col-10 col-sm-10 col-md-7 col-lg-7 col-xl-7"></config-counters>
                     </div>
                </section>

          
            <section class="section-blog" style="padding-top: 3rem;">
                <h1 class="text-center text-ws" style="font-weight: 800;">Nuestras Publicaciones de Blog</h1>
                
            </section>

            <section id="blog" class="container">
<?php 
	$url = "https://contratainternet.co/blog/wp-json/wp/v2/posts?_embed"; $ch = curl_init($url);  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$post = curl_exec($ch);
	$post = json_decode($post,true);
?>
				<div class="row" >


                    <div class="col-12 col-md-4" style="text-align: -webkit-center;">
                    

				<div class="thumbnail" style="width: 100%; background-position:center;height: 300px;background-size: cover; background-image: url('<?=$post[0]["_embedded"]["wp:featuredmedia"][0]["source_url"] ?>');" alt=""></div> 
                      <div class="fondo-blog">
                      
                      <div class="titulo-blog">
                      <?php print_r($post[0]["title"]["rendered"]);?>
                      </div> 
                        <br>                         
						<div class="texto-blog limitado ">
                            
                    <span> <?php  print_r($post[0]["excerpt"]["rendered"]);?> </span>   
                        </div>
                        <br>
                        <a href="<?php print_r($post[0]["link"]);?>">  <p>Leer mas</p>  </a> 



                      

					</div>
                      </div>
					<div class="col-12 col-md-4" style="text-align: -webkit-center;">
						<div class="thumbnail" style="width: 100%;background-position:center;background-size: cover; height: 300px; background-image: url('<?=$post[1]["_embedded"]["wp:featuredmedia"][0]["source_url"] ?>');" alt=""></div>
                      <div class="fondo-blog">
                      
                      <div class="titulo-blog">
                      <?php print_r($post[1]["title"]["rendered"]);?>
                      </div>  

                        <br> 
						<div class="texto-blog limitado">
                            
                        <?php  print_r($post[1]["excerpt"]["rendered"]);?>
                        </div>
                        <br>
                        <a href="<?php print_r($post[1]["link"]);?>">  <p>Leer mas</p>  </a> 


                      </div>
					</div>
					<div class="col-12 col-md-4" style="text-align: -webkit-center;">
						<div class="thumbnail" style="width: 100%; background-position:center;height: 300px;background-size: cover; background-image: url('<?=$post[2]["_embedded"]["wp:featuredmedia"][0]["source_url"] ?>');" alt=""></div>
                     <div class="fondo-blog">
                      
                     <div class="titulo-blog">
                      <?php print_r($post[2]["title"]["rendered"]);?>
                     </div>  

                    	<br> 
					<div class="texto-blog limitado">
                            
                    	<?php print_r($post[2]["excerpt"]["rendered"]);?>
                    </div>
                    <br>
                      <a href="<?php print_r($post[2]["link"]);?>">  <p>Leer mas</p>  </a> 

                     </div>
					</div>
				</div>
            </section>
            




            
            <section>
            

            </section>
           
        </div>
     
       

</div>

<style>
                            .limitado{

                            }
                        </style>
                        <script>
     function ellipsis_box(elemento, max_chars){
	limite_text = $(elemento).text();
	if (true)
	{
	limite = limite_text.substr(0, max_chars)+" ...";
	$(elemento).text(limite);
	}
	}
	$(function()
	{
	ellipsis_box(".limitado", 213);
	});
                        </script>
@stop



