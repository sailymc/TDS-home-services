<?php
include('../config.php');

if (!isset($_SESSION['user_admin'])) {
    echo redirect('index.php?logout');
}

$db->where('account_type','service_provider');
$seller_count = count($db->get('user'));

$db->where('account_type','client');
$client_count = count($db->get('user'));


$services = count($db->get('service'));



include('header.php');
?>

<h2> Panel de Control - Admin </h2>

<div id="root">
    <div class="container pt-5">
        <div class="row align-items-stretch">
            <div class="c-dashboardInfo col-lg-3 col-md-6">
                <div class="wrap">
                    </svg></h4><span class="hind-font caption-12 c-dashboardInfo__count text-success">Proveedores </span>
                    </svg></h4><span class="hind-font caption-12 c-dashboardInfo__count"><?php echo $seller_count ?></span>
                </div>
            </div>
            <div class="c-dashboardInfo col-lg-3 col-md-6">
                <div class="wrap">
                    </svg></h4><span class="hind-font caption-12 c-dashboardInfo__count text-danger">Clientes</span>
                    </svg></h4><span class="hind-font caption-12 c-dashboardInfo__count"><?php  echo $client_count ?></span>
                </div>
            </div>
            <div class="c-dashboardInfo col-lg-3 col-md-6">
                <div class="wrap">
                    </svg></h4><span class="hind-font caption-12 c-dashboardInfo__count text-danger">Servicios</span>
                    </svg></h4><span class="hind-font caption-12 c-dashboardInfo__count"><?php  echo $services ?></span>
                </div>
            </div>
            <!-- <div class="c-dashboardInfo col-lg-3 col-md-6">
                <div class="wrap">
                    </svg></h4><span class="hind-font caption-12 c-dashboardInfo__count text-danger">
                    </span>
                    </svg></h4><span class="hind-font caption-12 c-dashboardInfo__count"><?php //        echo $purchased_courses_count ?></span>
                </div>
            </div> -->
        </div>
    </div>
</div>




<?php include('footer.php'); ?>