<?php require_once('header.php') ?>



<div class="container">
<h2 class="mb-4"> Actualizar Perfil</h2>

    <div class="text-center mb-4">
        <img src="../uploads/1.png" id="profileImage" class="rounded-circle img-thumbnail" alt="Profile Image" style="width: 150px; height: 150px;">
    </div>

    <form>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="company_name">Nombre de empresa:</label>
                    <input type="text" class="form-control" id="company_name" name="company_name">
                </div>
                <div class="form-group">
                    <label for="phone_number">Teléfono:</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number">
                </div>
                <div class="form-group">
                    <label for="address">Dirección:</label>
                    <input type="text" class="form-control" id="address" name="address">
                </div>
                <div class="form-group">
                    <label for="image">Imagen:</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="city">Ciudad:</label>
                    <input type="text" class="form-control" id="city" name="city">
                </div>
                <div class="form-group">
                    <label for="state">Estado:</label>
                    <input type="text" class="form-control" id="state" name="state">
                </div>
                <div class="form-group">
                    <label for="country">País:</label>
                    <input type="text" class="form-control" id="country" name="country">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="additional_information">Información adicional:</label>
                    <textarea class="form-control" id="additional_information" name="additional_information" rows="5"></textarea>
                </div>
            </div>
            <div class="col-md-12 my-4 text-center">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>
    </form>
</div>



<?php require_once('footer.php') ?>