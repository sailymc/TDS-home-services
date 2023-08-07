<?php

include('../config.php');

if (!isset($_SESSION['user_admin'])) {
    echo redirect('index.php?logout');
}

$check = 0;
$message = '';
if (isset($_POST['service-title']) && $_POST['service-title'] != "") {

    $service_title = $_POST['service-title'];
    $description = $_POST['service-description'];
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
            $message =  "Lo sentimos, solo los formatos JPG, JPEG, PNG & GIF están permitidos.";
            $uploadOk = 0;
        }
        if (move_uploaded_file($_FILES["service-image"]["tmp_name"], $target_file)) {
            $check++;
        } else {
            $message =  "Lo sentimos, hubo un error al subir tu archivo.";
        }
    } else {
        $uploadOk = 0;
        $message = 'Por favor sube un archivo.';
    }

    if ($check == 1) {

        $data = [
            'title' => $service_title,
            'description' => $description,
            'price' => $price,
            'image' => $image,
        ];

        $service = $db->insert('services', $data);
        if ($service) {
            echo redirect('service.php');
        }
    }
}


include('header.php');

?>



<div class="container">
    <h2 class="mb-4"> Añadir Servicio</h2>
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
                <div class="form-group">
                    <label for="homeServiceSelect">Select a Home Service:</label>
                    <select class="form-control" id="homeServiceSelect">
                        <option value="Santo Domingo">Santo Domingo</option>
                        <option value="Santiago">Santiago</option>
                        <option value="San Pedro de Macorís">San Pedro de Macorís</option>
                        <option value="La Romana">La Romana</option>
                        <option value="San Cristóbal">San Cristóbal</option>
                        <option value="Puerto Plata">Puerto Plata</option>
                        <option value="San Francisco de Macorís">San Francisco de Macorís</option>
                        <option value="Salvaleón de Higüey">Salvaleón de Higüey</option>
                        <option value="Concepción de La Vega">Concepción de La Vega</option>
                        <option value="La Vega">La Vega</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="service-image">Imagen de Servicio:</label>
                    <input type="file" id="service-image" name="service-image" class="form-control-file" accept="image/*" required>
                </div>
                <div class="form-group">
                    <label for="service-price">Precio:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">RD$</span>
                        </div>
                        <input type="number" id="service-price" name="service-price" class="form-control" min="0" step="0.01" required>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="additional_information">Información adicional:</label>
                    <textarea class="form-control" id="additional_information" name="additional_information" rows="5"></textarea>
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


<script>
    // locations 
    const locationsDominicanRepublic = [
        "Santo Domingo",
        "Santiago",
        "San Pedro de Macorís",
        "La Romana",
        "San Cristóbal",
        
    ];

    // populate dropdown 
    const locationDropdown = document.getElementById('locationDropdown');

    locationsDominicanRepublic.forEach(location => {
        const option = new Option(location, location);
        locationDropdown.add(option);
    });
</script>
<script>

    // initialize Select2
    $(document).ready(function() {
        $('#locationDropdown').select2();
    });
</script>