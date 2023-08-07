<?php

include('../config.php');
include('header.php');
if (!isset($_SESSION['user_admin'])) {
    // echo redirect('index.php?logout');
}
$db->where('seller_id', $logged_in_user_id);
$users = $db->get('orders');


?>

<h2 class="mb-4">Mis Clientes</h2>


<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre del cliente</th>
                <th>E-Mail</th>
                <th>Precio</th>
             </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($users as $key => $val) {
            ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $val['first_name'] ?></td>
                    <td><?php echo $val['email'] ?></td>
                    <td><?php echo $val['price'] ?></td>
                    
                </tr>
            <?php
                $i++;
            }
            ?>
        </tbody>
    </table>
</div>




<?php include('footer.php'); ?>