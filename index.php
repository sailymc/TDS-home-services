<?php
include('config.php');


require_once('header.php');

//Geting data for plumbing
$db->where('service_name', 'Plomería');
$plumbing = count($db->get('service'));

//geting data for electrician
$db->where('service_name', 'Electricidad');
$electrician = count($db->get('service'));

//geting data for cleaning
$db->where('service_name', 'Limpieza del Hogar');
$house_cleaning = count($db->get('service'));
?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="first-slide" src="assets/img/slider8.png" alt="First slide">
      <div class="container">
        <div class="carousel-caption text-left">
          <p><a class="btn btn-lg btn-primary" href="#" role="button">{sign_up_button_text}</a></p>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img class="second-slide" src="assets/img/slider11.png" alt="Second slide">
      <div class="container">
        <div class="carousel-caption">
          <p><a class="btn btn-lg btn-primary" href="#" role="button">{learn_more_button_text}</a></p>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img class="third-slide" src="assets/img/slider12.png" alt="Third slide">
      <div class="container">
        <div class="carousel-caption text-right">
          <p><a class="btn btn-lg btn-primary" href="#" role="button">{browse_gallery_button_text}</a></p>
        </div>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Siguiente</span>
  </a>
</div>



<!-- Marketing messaging and featurettes
      ================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container mydiv">
  <div class="row mb-5 text-center">
    <div class="col-12">
      <h1 class="text-center" style="color: #542b03; font-family: 'Rockwell', sans-serif;">Servicios Populares</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <!-- bbb_deals -->
      <div class="bbb_deals">
        <div class="bbb_deals_slider_container">
          <div class="bbb_deals_item">
            <div class="bbb_deals_image"><img src="uploads/plomería.jpg" alt=""></div>
            <div class="bbb_deals_content">
              <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                <div class="bbb_deals_item_category"><a href="services.php?service=Plomería">Plomería</a></div>
                <div class="bbb_deals_item_price_a ml-auto"><strike>RD$100</strike></div>
              </div>
              <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                <div class="bbb_deals_item_name"> <a href="services.php?service=Plomería" style="color: #542b03">Servicios de Plomería</a></div>
                <div class="bbb_deals_item_price ml-auto">RD$700</div>
              </div>
              <div class="available">
                <div class="available_line d-flex flex-row justify-content-start">
                  <div class="available_title">Disponible: <span><?= $plumbing ?></span></div>
                </div>
                <div class="available_bar"><span style="width:17%"></span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <!-- bbb_deals -->
      <div class="bbb_deals">
        <div class="bbb_deals_slider_container">
          <div class="bbb_deals_item">
            <div class="bbb_deals_image"><img src="uploads/Lord-electricalcheck.jpg" alt=""></div>
            <div class="bbb_deals_content">
              <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                <div class="bbb_deals_item_category"><a href="#">Servicios de Electricidad</a></div>
                <div class="bbb_deals_item_price_a ml-auto"><strike>RD$150</strike></div>
              </div>
              <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                <div class="bbb_deals_item_name"><a href="services.php?service=Electricidad" style="color: #542b03">Electricistas Expertos</a></div>
                <div class="bbb_deals_item_price ml-auto">RD$800</div>
              </div>
              <div class="available">
                <div class="available_line d-flex flex-row justify-content-start">
                  <div class="available_title">Disponible: <span><?= $electrician ?></span></div>
                </div>
                <div class="available_bar"><span style="width:17%"></span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <!-- bbb_deals -->
      <div class="bbb_deals">
        <div class="bbb_deals_slider_container">
          <div class="bbb_deals_item">
            <div class="bbb_deals_image"><img src="uploads/cleanimage.jpg" alt=""></div>
            <div class="bbb_deals_content">
              <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                <div class="bbb_deals_item_category"><a href="#">Limpieza del Hogar</a></div>
                <div class="bbb_deals_item_price_a ml-auto"><strike>$50</strike></div>
              </div>
              <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                <div class="bbb_deals_item_name"> <a href="services.php?service=Limpieza del Hogar" style="color: #542b03">Limpiadores 
                del Hogar</a></div>
                <div class="bbb_deals_item_price ml-auto">RD$600</div>
              </div>
              <div class="available">
                <div class="available_line d-flex flex-row justify-content-start">
                  <div class="available_title">Disponible: <span><?= $house_cleaning ?></span></div>
                </div>
                <div class="available_bar"><span style="width:17%"></span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- Three columns of text below the carousel -->
<div class="container">
  <!-- FEATURETTES-->
  <hr class="featurette-divider">
  <div class="row featurette">
    <div class="col-md-7">
      <h2 class="featurette-heading" style="font-family: 'Rockwell', sans-serif;">Servicios Profesionales para el Hogar. <span class="text-muted">Experimenta la excelencia.</span></h2>
      <p class="lead">Obtén servicio para tu hogar por parte de expertos que superarán tus expectativas. Ofrecemos una amplia gama de servicios para satisfacer tus necesidades. Ya sea reparaciones, instalaciones o mantenimiento, nosotros nos encargamos. Siéntate, relájate y déjanos cuidar de tu hogar.</p>
    </div>
    <div class="col-md-5">
      <img class="featurette-image img-fluid mx-auto" src="assets/img/card6.png" alt="Imagen de reemplazo genérica">
    </div>
  </div>
  <hr class="featurette-divider">
  <div class="row featurette">
    <div class="col-md-7 order-md-2">
      <h2 class="featurette-heading" style="font-family: 'Rockwell', sans-serif;">Calidad y Servicio Inigualables. <span class="text-muted">Ver para creer.</span></h2>
      <p class="lead">Experimenta el más alto nivel de calidad y servicio para tu hogar. Nuestro equipo de profesionales capacitados está dedicado a ofrecer resultados excepcionales. Desde renovaciones y remodelaciones hasta limpieza y organización, nos esforzamos por hacer que tu hogar sea lo mejor posible. Descubre la diferencia que podemos hacer para ti.</p>
    </div>
    <div class="col-md-5 order-md-1">
      <img class="featurette-image img-fluid mx-auto" src="assets/img/card7.png" alt="Imagen de reemplazo genérica">
    </div>
  </div>
  <hr class="featurette-divider">
  <div class="row featurette">
    <div class="col-md-7">
      <h2 class="featurette-heading" style="font-family: 'Rockwell', sans-serif;">Transforma Tu Hogar Hoy. <span class="text-muted">Experimenta la diferencia.</span></h2>
      <p class="lead">¿Listo para un cambio? Permítenos ayudarte a transformar tu hogar en el espacio que siempre has soñado. Desde diseño de interiores y paisajismo hasta automatización del hogar y sistemas de seguridad, nuestro equipo de expertos puede convertir tu visión en realidad. Mejora tu entorno de vida y disfruta de un hogar que refleje tu estilo y personalidad.</p>
    </div>
    <div class="col-md-5">
      <img class="featurette-image img-fluid mx-auto" src="assets/img/card8.png" alt="Imagen de reemplazo genérica">
    </div>
  </div>
</div>

<hr class="featurette-divider">

<!-- /END FEATURETTES -->

</div><!-- /.container -->

<?php require_once('footer.php') ?>