<?php

include('../config.php');

if (!isset($_SESSION['user_admin'])) {
    echo redirect('index.php?logout');
}


$service_provider = $db->rawQuery(
    "SELECT 
                                    u.user_id, 
                                    u.username, 
                                    u.email, 
                                    u.password, 
                                    u.account_type, 
                                    u.registration_date,
                                    u.document,
                                    sp.provider_id,
                                    sp.company_name,
                                    sp.phone_number,
                                    sp.image,
                                    sp.address,
                                    sp.city,
                                    sp.state,
                                    sp.country,
                                    sp.additional_information
                                    FROM 
                                    user u
                                    LEFT OUTER JOIN 
                                    service_provider_profile sp
                                    ON 
                                    u.user_id = sp.user_id 
                                    WHERE
                                    u.account_type='service_provider';
"
);



include('header.php');
?>

<h2 class="mb-4">Todos los proveedores</h2>


<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Imagen</th>
                <th>Nombre de Usuario</th>
                <th>Nombre de la empresa</th>
                <th>Teléfono</th>
                <th>Ciudad</th>
                <th>País</th>
                <th>Información adicional</th>
                <th>Documento</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            if (count($service_provider) > 0) {
                foreach ($service_provider as $key => $val) {
            ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td class="picture">
                            <img src="../uploads/profile/<?= $val['image'] ?>" class="img-thumbnail">
                        </td>
                        <td><?php echo $val['username'] ?></td>
                        <td><?php echo $val['company_name'] ?></td>
                        <td><?php echo $val['phone_number'] ?></td>
                        <td><?php echo $val['city'] ?></td>
                        <td><?php echo $val['country'] ?></td>
                        <td><?php echo $val['additional_information'] ?></td>
                        <td><a href="../uploads/<?= $val['document'] ?>" target="_blank" class="btn-success btn-sm"> vista </a></td>
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




<?php include('footer.php'); ?>