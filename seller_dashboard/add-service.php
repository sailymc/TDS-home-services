<?php

include('../config.php');

if (!isset($_SESSION['user'])) {
    // echo redirect('index.php?logout');
}

$check = 0;
$message = '';
if (isset($_POST['submit'])) {

    $service_name = $_POST['service_name'];
    $description = $_POST['additional_information'];
    $location = $_POST['location'];
    $price = $_POST['service-price'];
    $image = $_FILES["service-image"]["name"];


    $target_dir = "../uploads/";
    $target_file = $target_dir . $_FILES["service-image"]["name"];
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check_1 = isset($_FILES["service-image"]["tmp_name"]) && $_FILES["service-image"]["tmp_name"] != '' ? getimagesize($_FILES["service-image"]["tmp_name"]) : 0;

    if ($check_1 !== false) {
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            $message =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        if (move_uploaded_file($_FILES["service-image"]["tmp_name"], $target_file)) {
            $check++;
        } else {
            $message =  "Sorry, there was an error uploading your file.";
        }
    } else {
        $uploadOk = 0;
        $message = 'Please upload image file';
    }

    if ($check == 1) {

        $data = [
            'service_name' => $service_name,
            'description' => $description,
            'location' => $location,
            'price' => $price,
            'image' => $image,
            'seller_id' => $logged_in_user_id,
        ];

        $service = $db->insert('service', $data);
        if ($service) {
            echo redirect('services.php');
        }
    }
    // print_r($_POST);die;
}



include('header.php');

?>



<div class="container">
    <h2 class="mb-4"> Agregar servicio</h2>
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
                            <option value="<?= $value ?>">
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
                            <option value="<?= $value ?>"> <?= $value ?> </option>
                        <?php
                        }
                        ?>

                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="service-image">Imagen de servicio:</label>
                    <input type="file" id="service-image" name="service-image" class="form-control-file" accept="image/*" required>
                </div>
                <div class="form-group">
                    <label for="service-price">Precio:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="number" id="service-price" name="service-price" class="form-control" min="0" step="0.01" required>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="additional_information">Acerca del Servicio:</label>
                    <textarea class="form-control" id="additional_information" name="additional_information" rows="5"></textarea>
                </div>
            </div>
            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <input type="submit" value="Guardar" name="submit" class="btn btn-primary" required>
                </div>
            </div>
        </div>
    </form>
</div>
<?php include('footer.php'); ?>

