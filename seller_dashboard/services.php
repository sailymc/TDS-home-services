<?php

include('../config.php');


if (!isset($_SESSION['user'])) {
    // echo redirect('index.php?logout');
}

$db->where('seller_id', $logged_in_user_id);
$service= $db->get('service');



  

include('header.php');
?>

<div class="container">
    <h2 class="mb-4"> Administrar Servicios
 </h2>
    <a href="add-service.php" class="btn btn-primary"> AÑADIR NUEVO SERVICIO
 </a>

    <div class="table-responsive mt-3">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Imagen</th>
                    <th>Servicio </th>
                    <?php // <th>Description</th>
                    ?>
                    <th>Ubicación</th>
                    <th>Precio</th>
                    <th>Servicio</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $i = 1;

                if (count($service) > 0) {
                    foreach ($service as $key => $val) {

                ?>
                        <tr>
                            <td><?php // // echo  $i 
                                ?></td>
                            <td class="picture"><img src="../uploads/<?php echo $val['image'] ?>" class="img-thumbnail"></td>
                            <td><?php echo $val['service_name'] ?></td>
                            <?php //<td><?php  echo $val['description'] 
                            ?></td>
                            <td><?php echo $val['location'] ?> </td>
                            <td>$<?php echo $val['price'] ?>.00 </td>
                            <td>
                            <a href="delete.php?service_id=<?php echo $val['service_id']; ?>" class="btn-danger btn-sm mr-1" onclick="return confirmDelete()">Eliminar</a>
                                <a href="edit-service.php?id=<?php echo $val['service_id'] ?>" class="btn-success btn-sm"> Actualizar </a>
                            </td>
                        </tr>
                <?php
                         $i++;
                    }
                } else {
                    echo 'Registro no encontrado.';
                }

                ?>
            </tbody>
        </table>
    </div>
</div>
<script>
  function confirmDelete() {
    if (confirm("¿Estás seguro de que quieres eliminar este servicio?")) {
      window.location.href = event.target.href;
    } else {
      // The user clicked "Cancel" on the alert, do nothing.
    }
  }
</script>

<?php include('footer.php'); ?>

<script>
  function confirmDelete() {
    if (confirm("¿Estás seguro de que quieres eliminar este servicio?")) {
      return true; // Proceed with the deletion by allowing the anchor tag's default behavior.
    } else {
      return false; // Cancel the deletion by preventing the anchor tag's default behavior.
    }
  }
</script>



<?php 
?>