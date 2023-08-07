<?php

include('../config.php');

if (!isset($_SESSION['user_admin'])) {
    echo redirect('index.php?logout');
}


$client_profile = $db->rawQuery(
    "SELECT 
                                    u.user_id, 
                                    u.username, 
                                    u.email, 
                                    u.password, 
                                    u.account_type, 
                                    u.registration_date,
                                    u.document,
                                    cp.full_name,
                                    cp.phone_number,
                                    cp.address,
                                    cp.address,
                                    cp.city,
                                    cp.state,
                                    cp.country,
                                    cp.additional_information
                                    FROM 
                                    user u
                                    LEFT OUTER JOIN 
                                    client_profile cp
                                    ON 
                                    u.user_id = cp.user_id 
                                    WHERE
                                    u.account_type='client';
"
);
// print_r($client_profile);die;

include('header.php');
?>

<h2 class="mb-4">Todos los Clientes</h2>


<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre completo</th>
                <th>E-Mail</th>
                <th>Documento</th>

            </tr>
        </thead>
        <tbody>
        <?php
                $i = 1;
                if (count($client_profile) > 0) {
                    foreach ($client_profile as $key => $val) {
                ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            
                            <td><?php echo $val['username'] ?></td>
                            <td><?php echo $val['email'] ?></td>
                            <td><a href="../uploads/<?= $val['document'] ?>" target="_blank" class="btn-success btn-sm"> ver </a></td>

                            <td>
                                <!-- <a href="javascript:confirmdelete('<?php echo $val['course_id']; ?>')" class="btn-danger btn-sm mr-1"> Delete </a> -->
                                <!-- <a href="update-course.php?id=<?php echo $val['course_id'] ?>" class="btn-success btn-sm"> Update </a> -->
                            </td>
                        </tr>
                <?php
                        $i++;
                    }
                } 
                else {
                    echo 'Registro no encontrado.';
                }
                ?>
        </tbody>
    </table>
</div>




<?php include('footer.php'); ?>