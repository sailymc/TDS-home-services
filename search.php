<?php
include('config.php');
require_once('header.php');


$location = $_GET['search'];

$services = $db->query(
  "SELECT
    s.service_id,s.service_name,s.location, u.user_id, u.username,s.seller_id,s.price,s.description,s.image , sp.company_name
    from
    service_provider_profile sp,
    service s, user u 
    WHERE 
    u.user_id= sp.user_id and
    u.user_id=s.seller_id and s.location='$location'"
);

$count_services = count($services);

?>

<div class="container my-5">
  <div class="row  mb-4 text-center">
    <div class="col-md-12">
      <?php if (isset($_GET['search'])) {
      ?>
        <h3 class='text-capitalize font-weight-bold'> Ubicación: <?= $_GET['search'] ?> </h3>

      <?php }  ?>

      <h3 class=" font-weight-bold text-capitalize text-success"> Total de Servicios Disponible: <?= $count_services ?> </h3>
    </div>
  </div>


  <div class="d-flex justify-content-center row">
    <div class="col-md-10">
      <?php foreach ($services as $key => $value) {
      ?>
        <div class="row p-2 bg-white border rounded mt-2">
          <div class="col-md-3 mt-1 text-center">
            <h5 class="my-2">Proveedor: <a href="seller-profile.php?id=<?= $value['user_id'] ?>"><?= $value['username'] ?></a></h5>
            <img class="img-fluid img-responsive rounded product-image" src="uploads/<?= $value['image'] ?>">
          </div>
          <div class="col-md-6 mt-1">
            <h5>Servicio de <?= $value['service_name'] ?></h5>
            <div class="d-flex flex-row">

            </div>
            <div class="mt-3 mb-1 spec-1">
              <!-- <span class="dot"></span>
              <span>Nombre: <?= $value['company_name'] ?></span> <br> -->
              <span class="dot"></span>
              <span>Habilidades en <?= $value['service_name'] ?></span> <br>
              <span class="dot"></span>
              <span>Reparaciones y mantenimiento</span><br>
            </div>
            <div class="mt-1 mb-1 spec-1">
              <span class="dot"></span>
              <span>Servicios de Emergencia</span>
            </div>
            <p class="text-justify text-truncate para mb-0 mt-3"><?= $value['description'] ?>.<br><br></p>
          </div>
          <div class="align-items-center align-content-center col-md-3 border-left mt-1">
            <div class="d-flex flex-row align-items-center">
              <h4 class="mr-1">$<?= $value['price'] ?></h4>
              <span class="strike-text">RD$300</span>
            </div>
            <h6 class="text-success">Sin costes de transporte</h6>
            <div class="d-flex flex-column mt-4">
              <a href="booking.php?service_id=<?= $value['service_id'] ?>" class="btn btn-primary btn-sm"> Solicitar Ahora</a>
            </div>
          </div>
        </div>
      <?php
        # code...
      } ?>
    </div>
  </div>
</div>


<?php require_once('footer.php') ?>