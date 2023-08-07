<?php
require_once('header.php');

include('../config.php');

if (!isset($_SESSION['user'])) {
    // echo redirect('index.php?logout');
}

$entry_exist = 0;

$db->where('user_id', $logged_in_user_id);
$profile = $db->getOne('service_provider_profile');


if ($profile !== null && count($profile) > 0) {
    $entry_exist = 1;
}



$message = '';
if (isset($_POST['submit'])) {
    // Retrieve other form data
    $company_name = $_POST['company_name'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $additional_information = $_POST['additional_information'];

    // Check if an image was uploaded
    if (!empty($_FILES["image"]["name"])) {
        $image = $_FILES["image"]["name"];
        $target_dir = "../uploads/profile/";
        $target_file = $target_dir . $_FILES["image"]["name"];
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check_1 = isset($_FILES["image"]["tmp_name"]) && $_FILES["image"]["tmp_name"] != '' ? getimagesize($_FILES["image"]["tmp_name"]) : 0;

        if ($check_1 !== false) {
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
            ) {
                $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $check++;
            } else {
                $message = "Sorry, there was an error uploading your file.";
            }
        } else {
            $uploadOk = 0;
            $message = 'Please upload a valid image file';
        }
    } else {
        // Image not uploaded, do not update the 'image' column
        $image = '';
    }

    // Create the data array with or without the 'image' column
    $data = [
        'company_name' => $company_name,
        'phone_number' => $phone_number,
        'address' => $address,
        'city' => $city,
        'state' => $state,
        'country' => $country,
        'additional_information' => $additional_information
    ];

    // Include the 'image' column only if an image was uploaded
    if (!empty($image)) {
        $data['image'] = $image;
    }

    // Update the database record
    $db->where('user_id', $logged_in_user_id);
    $user = $db->update('service_provider_profile', $data);

    if ($user) {
        echo redirect('profile.php');
    }
}


?>


<div class="container">
    <h2 class="mb-4"> Actualización del Perfil</h2>

    <div class="text-center mb-4">
        <img src="../uploads/profile/<?= $profile['image'] ?>" id="profileImage" class="rounded-circle img-thumbnail" alt="Profile Image" style="width: 150px; height: 150px;">
    </div>

    <form method="POST" action="#" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="company_name">Nombre de empresa:</label>
                    <input type="text" class="form-control" id="company_name" name="company_name" value="<?php echo $entry_exist ? $profile['company_name'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="phone_number">Número de teléfono:</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?php echo $entry_exist ? $profile['phone_number'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="address">Dirección:</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?php echo $entry_exist ? $profile['address'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="image">Imagen de perfil:</label>
                    <input type="file" id="image" name="image" class="form-control-file" accept="image/*">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="city">Ciudad:</label>
                    <input type="text" class="form-control" id="city" name="city" value="<?php echo $entry_exist ? $profile['city'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="state">Estado:</label>
                    <input type="text" class="form-control" id="state" name="state" value="<?php echo $entry_exist ? $profile['state'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="country">País:</label>
                    <input type="text" class="form-control" id="country" name="country" value="<?php echo $entry_exist ? $profile['country'] : ''; ?>">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="additional_information">Escribe algo que quieras que tus clientes sepan sobre ti.</label>
                    <textarea class="form-control" id="additional_information" name="additional_information" rows="5"><?php echo $entry_exist ? $profile['additional_information'] : ''; ?></textarea>
                </div>
            </div>
            <div class="col-md-12 my-4 text-center">
                <button type="submit" name="submit" class="btn btn-primary">Enviar</>
            </div>
        </div>
    </form>
</div>



<?php require_once('footer.php') ?>