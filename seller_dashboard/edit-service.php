<?php

include('../config.php');

if (!isset($_SESSION['user'])) {
    // echo redirect('index.php?logout');
}

$service_id = $_GET['id'];

$db->where('service_id', $service_id);
$service = $db->getOne('service');


$message = '';
if (isset($_POST['submit'])) {

    $service_name = $_POST['service_name'];
    $description = $_POST['additional_information'];
    $location = $_POST['location'];
    $price = $_POST['service-price'];


    $data = [
        'service_name' => $service_name,
        'description' => $description,
        'location' => $location,
        'price' => $price,
        'seller_id' => $logged_in_user_id
    ];
    $db->where('service_id', $service_id);
    $service = $db->update('service', $data);
    if ($service) {
        echo redirect('services.php');
    }
    // print_r($_POST);die;
}



include('header.php');

?>



<div class="container">
    <h2 class="mb-4"> Editar servicio</h2>
    <form method="post" enctype="multipart/form-data" action='#'>
        <?php
        if ($message != '') {
        ?>
        <div class="col-md-6">
            <div class="alert alert-danger" role="alert">
                <?php echo $message ?>
            </div>
        </div>
        <?php
        }
        ?>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <?php
                    $service_name = [
                        'Plomería',
                        'Electricidad',
                        'Carpintería',
                        'Limpieza del Hogar',
                        'Jardinería/Paisajismo',
                        'Pintura',
                        'Reparación de electrodomésticos',
                        'AC (Aire acondicionado)',
                        'Seguridad del hogar',
                        'Diseño de interiores'
                    ];
                    ?>
                    <label for="homeServiceSelect">Selecciona un Servicio a Domicilio:</label>
                    <select name='service_name' class="form-control" id="homeServiceSelect">
                        <?php
                        foreach ($service_name as  $value) {
                        ?>
                        <option <?php if ($value == $service['service_name']) echo 'selected' ?> value="<?= $value ?>">
                            <?= $value ?> </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <?php
                    $location = [
                        'Santo Domingo',
                        'Santo Domingo Oeste',
                        'Santo Domingo Norte',
                        'La Romana',
                        'San Pedro de Macorís',
                        'San Cristóbal',
                        'Puerto Plata',
                        'Salvaleón de Higüey',
                        'Bonao',
                        'Mao (Valverde)',
                        'San Juan de la Maguana',
                        'Baní',
                        'Moca',
                        'Azua',
                        'Hato Mayor del Rey',
                        'Cotuí',
                        'Santiago',
                        'La Romana',
                        'San Francisco de Macorís',
                        'Salvaleón de Higüey',
                        'Concepción de La Vega',
                        'La Vega'
                    ];

                    ?>
                    <label for="homeServiceSelect">Seleccionar ubicación:</label>
                    <select name="location" class="form-control" id="homeServiceSelect">
                        <?php
                        foreach ($location as  $value) {
                        ?>
                        <option <?php if ($value == $service['location']) echo 'selected' ?> value="<?= $value ?>">
                            <?= $value ?> </option>
                        <?php
                        }
                        ?>

                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <!-- <div class="form-group">
                    <label for="service-image">Service Image:</label>
                    <input type="file" id="service-image"   name="service-image" class="form-control-file" accept="image/*" required>
                </div> -->
                <div class="form-group">
                    <label for="service-price">Precio:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="number" value="<?= $service['price'] ?>" id="service-price" name="service-price"
                            class="form-control" min="0" step="0.01" required>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="additional_information">Escribe algo que quieras que tus clientes sepan sobre ti.</label>
                    <textarea class="form-control" id="additional_information" name="additional_information"
                        rows="5"><?= $service['description'] ?></textarea>
                </div>
            </div>
            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <input type="submit" value="Save" name="submit" class="btn btn-primary" required>
                </div>
            </div>
        </div>
    </form>
</div>
<?php include('footer.php'); ?>