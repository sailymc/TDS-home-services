<?php
include('../config.php');



if (!isset($_SESSION['user'])) {
    echo redirect('./login.php');
}

$db->where('seller_id',$logged_in_user_id);
$services = count($db->get('service'));

$db->where('status',0); // for active orders status 0
$db->where('seller_id',$logged_in_user_id);
$active_orders = count($db->get('orders'));

$db->where('status',1); // for completed orders status 1
$db->where('seller_id',$logged_in_user_id);
$completed_orders = count($db->get('orders'));


// Earnings
$db->where('status',1); // for completed orders status 1
$db->where('seller_id',$logged_in_user_id);
$earnings = $db->get('orders');

$total = 0; // Initialize a variable to store the total

foreach ($earnings as $earning) {
    $total += $earning['price']; // Add each price to the total
}


include('header.php');
?>

<h2> Panel del Proveedor
 </h2>

<div id="root">
    <div class="container pt-5">
        <div class="row align-items-stretch">
            <div class="c-dashboardInfo col-lg-3 col-md-6">
                <div class="wrap">
                    </svg></h4><span class="hind-font caption-12 c-dashboardInfo__count text-success">Mis servicios </span>
                    </svg></h4><span class="hind-font caption-12 c-dashboardInfo__count"><?=     $services ?></span>
                </div>
            </div>
            <div class="c-dashboardInfo col-lg-3 col-md-6">
                <div class="wrap">
                    </svg></h4><span class="hind-font caption-12 c-dashboardInfo__count text-success">Ordenes activas
 </span>
                    </svg></h4><span class="hind-font caption-12 c-dashboardInfo__count"><?=  $active_orders ?></span>
                </div>
            </div>
            <div class="c-dashboardInfo col-lg-3 col-md-6">
                <div class="wrap">
                    </svg></h4><span class="hind-font caption-12 c-dashboardInfo__count text-danger">Terminada</span>
                    </svg></h4><span class="hind-font caption-12 c-dashboardInfo__count"><?= $completed_orders ?></span>
                </div>
            </div>
            <div class="c-dashboardInfo col-lg-3 col-md-6">
                <div class="wrap">
                    </svg></h4><span class="hind-font caption-12 c-dashboardInfo__count text-info">Ganancias</span>
                    </svg></h4><span class="hind-font caption-12 c-dashboardInfo__count">$<?= $total ?></span>
                </div>
            </div>

        </div>
    </div>
</div>




<?php include('footer.php'); ?>