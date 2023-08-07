<?php
require_once('config.php');

include('header.php');




if ($account_type == 'client') {


  $sql = "SELECT
  orders.order_id,
  provider_user.username AS provider,
  provider_user.user_id AS seller_id,
  service.service_name,
  client_user.username AS client_name,
  orders.first_name,
  orders.phone_number,
  orders.email,
  orders.address,
  orders.created_at,
  orders.price,
  orders.status
  FROM orders
  LEFT JOIN user AS provider_user ON orders.seller_id = provider_user.user_id
  LEFT JOIN service ON orders.service_id = service.service_id
  LEFT JOIN user AS client_user ON orders.client_id = client_user.user_id
  WHERE orders.client_id = '$logged_in_user_id'";
} else {


  $sql = "SELECT
orders.order_id,
provider_user.username AS provider,
provider_user.user_id AS seller_id,
service.service_name,
client_user.username AS client_name,
orders.first_name,
orders.phone_number,
orders.email,
orders.address,
orders.created_at,
orders.price,
orders.status
FROM orders
LEFT JOIN user AS provider_user ON orders.seller_id = provider_user.user_id
LEFT JOIN service ON orders.service_id = service.service_id
LEFT JOIN user AS client_user ON orders.client_id = client_user.user_id
WHERE orders.seller_id = '$logged_in_user_id'";
}


$order = $db->query($sql);

// print_r($order);
// die;



?>



<div class="container my-5  ">
  <div class="row">
    <div class="col-md-12 order-md-1">
      <h4 class="mb-3"></h4>
      <main role="main" class="container">
        <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded box-shadow">
          <!-- <img class="mr-3" src="https://getbootstrap.com/assets/brand/bootstrap-outline.svg" alt="" width="48" height="48"> -->
          <div class="lh-100">
            <h6 class="mb-0 text-white lh-100">MIS SERVICIOS</h6>
            <small></small>
          </div>
        </div>

        <div class="my-3 p-3 bg-white rounded box-shadow">
          <div class="row">
            <div class="col-12">
              <table class="table" id="std_table">
                <thead>
                  <tr>
                    <th scope="col">#ID Solicitud</th>
                    <?php if ($account_type == 'client') {
                    ?>
                      <th scope="col">Servicio</th>
                      <th scope="col">Nombre del Proveedor</th>
                      <th scope="col">Creado en</th>

                    <?php } else {
                    ?>
                      <th scope="col">Servicio</th>
                      <th scope="col">Nombre del Cliente</th>
                      <th scope="col">Creado en</th>
                      <!-- <th scope="col">Address</th> -->

                    <?php
                    } ?>
                    <th> Precio </th>
                    <th scope="col">Estado</th>

                    <th scope="col">Ir a Solicitud</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  if (count($order) > 0) {
                    foreach ($order as $key => $value) {
                  ?>
                      <th scope="row"><?php echo $i; ?></th>

                      <?php if ($account_type == 'client') {

                      ?>
                        <td><?php echo $value['service_name']; ?></td>
                        <td><a href="seller-profile.php?id=<?= $value['seller_id']  ?>" style="color: grey;"><?php echo $value['provider']; ?></td>

                        <td><?php echo $value['created_at']; ?></td>
                        <td>$<?php echo $value['price']; ?></td>


                      <?php } else {
                      ?>
                        <td><?php echo $value['service_name']; ?></td>
                        <td><?php echo $value['first_name']; ?></td>
                        <td><?php echo $value['created_at']; ?></td>
                        <td>$<?php echo  $value['price']; ?></td>

                      <?php
                      } ?>
                      <?php
                      if ($value['status'] == 1) {

                      ?>
                        <td><span class="badge badge-success">Completada</span></td>

                      <?php

                      } else {
                      ?>
                        <td><span class="badge badge-primary">En curso</span></td>

                      <?php
                      }
                      ?>
                      <td><a href="order-page.php?order_id=<?= $value['order_id'] ?>"><button type="button" class="btn btn-info">Ver solicitud</button></a></td>

                      </tr>
                    <?php
                      $i++;
                    }
                  } else {
                    ?>
                    <tr>
                      <th scope="row"><?php echo "Solicitudes no encontradas"; ?></th>
                    </tr>
                  <?php
                  } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
</div>

<?php require_once('footer.php') ?>