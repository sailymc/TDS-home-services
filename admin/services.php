<?php

include('../config.php');


if (!isset($_SESSION['user_admin'])) {
    echo redirect('index.php?logout');
}

// $service = $db->get('service');

$service = $db->query("SELECT s.service_name,s.image,u.username as provider_name , u.document ,s.description,s.price
from
service s, user u  
WHERE u.user_id=s.seller_id and u.account_type='service_provider'");



include('header.php');
?>

<div class="container">
    <h2 class="mb-4"> Todos los servicios </h2>

    <div class="table-responsive mt-3">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Imagen</th>
                    <th>Servicio</th>
                    <th>Descripción</th>
                    <th>Nombre del proveedor</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                if (count($service) > 0) {
                    foreach ($service as $key => $val) {
                ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td class="picture">
                                <img src="../uploads/<?= $val['image'] ?>" class="img-thumbnail">
                            </td>
                            <td><?php echo $val['service_name'] ?></td>
                            <td><?php echo $val['description'] ?></td>
                            <td><?php echo $val['provider_name'] ?></td>
                            <td>$<?php echo $val['price'] ?>.00 </td>


                            <td>
                                <!-- <a href="javascript:confirmdelete(' ')" class="btn-danger btn-sm mr-1"> Delete </a> -->
                                <!-- <a href="update-course.php?id= " class="btn-success btn-sm"> Update </a> -->
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

<?php include('footer.php'); ?>

<script>
    function confirmdelete(id) {
        if (window.confirm("¿Estás seguro?")) {
            window.location = "course.php?delete=" + id;
        }
    }
</script>