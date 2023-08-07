<?php
require_once('config.php');

include('header.php');
$status = 1;


if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    $sql = "SELECT
orders.order_id,
provider_user.username AS provider_name,
provider_user.user_id seller_id,
service.service_name,
service.image,
service.location,
service.description,
client_user.username AS client_name,
orders.first_name,
orders.last_name,
orders.phone_number as phone,
orders.email,
orders.status,
orders.address,
orders.created_at,
orders.price,
orders.date
FROM orders
LEFT JOIN user AS provider_user ON orders.seller_id = provider_user.user_id
LEFT JOIN service ON orders.service_id = service.service_id
LEFT JOIN user AS client_user ON orders.client_id = client_user.user_id
WHERE orders.order_id = $order_id";



    $order = $db->query($sql)[0];
    // print_r($order);die;
    if (isset($_POST['complete_order'])) {

        $data = [
            'status' => $status,
        ];

        $db->where('order_id', $order_id);
        $service = $db->update('orders', $data);

        echo redirect("order-page.php?order_id=$order_id&completed");
    }
}

$db->where('order_id', $order_id);
$review = $db->get('review');



?>

<div class="container mt-5">
    <h2>Página de pedido</h2>
    <?php
    if (isset($_GET['completed'])) {
    ?>
        <div class="alert alert-primary" role="alert">
        Pedido completado</a> Puede dar una opinión sobre este proveedor de servicios.
        </div>
    <?php
    } ?>
    <div class="row my-5">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">

                    </h5>
                    <p class="card-title">
                    <div class="row">
                        <div class="col-4">
                            <img src="uploads/<?= $order['image'] ?>" class='img-thumbnail' alt="Image" class="mr-2" width="100"> <!-- Add your image here -->

                        </div>
                        <div class="col-8">
                            <h3> Detalles de su pedido
</h3>
                        </div>

                    </div>
                    <div class="row mt-4">
                        <div class="col-12 ">

                            <p> #ID: <?= $order['order_id']  ?> </p>
                            <p>Servicio: <?= $order['service_name']  ?></p>
                            <p>Ubicación del servicio : <?= $order['location']  ?> </p>
                            <hr>
                            <strong> Información del cliente: </strong>
                            <br>
                            <br>
                            <p> Nombre en orden: <?= $order['first_name'] . ' ' . $order['last_name']  ?> </p>
                            <p> E-Mail : <?= $order['email'] ?> </p>
                            <p> Teléfono : <?= $order['phone'] ?> </p>
                            <p> Dirección : <?= $order['address'] ?> </p>
                            <hr>
                            <p> Acerca del servicio :<?= $order['description']  ?></p>

                        </div>
                    </div>
                    </p>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">
                        Detalles de la Solicitud
                    </h5>
                    <p class="card-title">
                    <div class="row">
                        <div class="col-4">
                            <img src="uploads/<?= $order['image'] ?>" class='img-thumbnail' alt="Image" class="mr-2" width="100"> <!-- Add your image here -->

                        </div>
                        <div class="col-8">
                            <h5> <?= $order['service_name'] ?> </h5>
                            <?php
                            if ($order['status'] == 1) {

                            ?>
                                <td><span class="badge badge-success">Completada</span></td>

                            <?php

                            } else {
                            ?>
                                <td><span class="badge badge-primary">En curso</span></td>

                            <?php
                            }
                            ?>
                        </div>

                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <?php
                            if ($account_type == 'client') {
                            ?>
                                <p> Proporcionado por <strong class="float-right"> <?= $order['provider_name']  ?> </strong></p>

                            <?php
                            } else {
                            ?>
                                <p> Solicitado por <strong class="float-right"> <?= $order['client_name']  ?> </strong></p>

                            <?php
                            }
                            ?>
                            <p>Fecha: <strong class="float-right"><?= $order['date']  ?> </strong></p>
                            <p>Total:<strong class="float-right"> $<?= $order['price']  ?> </strong></p>
                            <p>#ID: <strong class="float-right"> <?= $order['order_id']  ?> </strong></p>
                        </div>
                    </div>
                    </p>
                    <?php
                    if ($account_type == 'client') {
                        if ($order['status'] == 0) {
                    ?>
                            <div>
                                <P class="text-danger"> Complete el pedido cuando esté listo. </P>
                            </div>
                            <form method="POST" action="#" id="complete_order">
                                <input type="button" onclick="completeOrd()" value="Complete" class="btn btn-primary">
                                <input type="hidden" name="complete_order">
                            </form>
                    <?php
                        }
                    }
                    ?>

                </div>
            </div>
        </div>



        <?php


        if ($order['status'] == 1) {
        ?>
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">

                        </h5>
                        <p class="card-title">
                        <div class="row">

                            <div class="col-8">
                                <h4> El pedido se completó exitosamente.</h>
                            </div>

                        </div>
                        <div class="row mt-4">
                            <div class="col-12">
                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


                                <?php
                                if ($account_type == 'client') {
                                    echo '<p> Reseña para este proveedor
                                    </p>';
                                } else {

                                    echo '<p> <strong>' . $order['client_name'] . '</strong> di ' . $review[0]['rating'] . ' estrella ratings </p>';
                                }
                                ?>

                                <?php

                                ?>

                                <?php if (count($review) > 0) {

                                ?>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="ratings">
                                            <?php for ($i = 1; $i <= 5; $i++) {
                                                // Check if the current star is part of the rating or not
                                                $isStarFilled = $i <= $review[0]['rating'];
                                                // Check if the star should be colored or not
                                                $isRatingColor = $i <= $review[0]['rating'];
                                            ?>
                                                <i class="fa <?php echo $isStarFilled ? 'fa-star' : 'fa-star-o'; ?> <?php echo $isRatingColor ? 'rating-color' : ''; ?>"></i>
                                            <?php } ?>
                                        </div>
                                        <h5 class="review-count"><?php echo $review[0]['rating']; ?> ESTRELLAS</h5>
                                    </div>

                                    <div class="row mt-5">
                                        <div class="col-md-12">
                                            <div class="card mb-4">
                                                <div class="card-body">
                                                    <h5 class="card-title"> Comentario </h5>
                                                    <hr>
                                                    <p class="card-text p-2"><?= $review[0]['review_text'] ?>.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <?php

                                } else {
                                    if ($account_type == 'client') {
                                    ?>


                                        <div class="container d-flex justify-content-center mt-200">

                                            <form method="post" action='submit-review.php'>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="stars">

                                                            <input class="star star-5" id="star-5" value="5" type="radio" name="star" />

                                                            <label class="star star-5" for="star-5"></label>

                                                            <input class="star star-4" id="star-4" type="radio" value="4" name="star" />

                                                            <label class="star star-4" for="star-4"></label>

                                                            <input class="star star-3" id="star-3" type="radio" value="3" name="star" />

                                                            <label class="star star-3" for="star-3"></label>

                                                            <input class="star star-2" id="star-2" type="radio" value="2" name="star" />

                                                            <label class="star star-2" for="star-2"></label>

                                                            <input class="star star-1" id="star-1" type="radio" value="1" name="star" />

                                                            <label class="star star-1" for="star-1"></label>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlTextarea1">¡Comparte tu experiencia con este proveedor!</label>
                                                            <textarea class="form-control" name="review_text" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                            <input type="hidden" name="seller_id" value="<?= $order['seller_id'] ?>">
                                                            <input type="hidden" name="order_id" value="<?= $_GET['order_id'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 text-center mt-2">
                                                        <button class="btn btn-primary" type="submit">Enviar opinión</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    <?php  } ?>
                            </div>
                        </div>
                    </div>
                    </p>
                </div>
            </div>
    <?php
                                }
                            }
    ?>

    </div>
</div>
</div>
</div>
</div>

<?php require_once('footer.php') ?>

<script>
    function completeOrd() {
        if (confirm("¿Quieres marcar esta orden como completada?")) {
            document.getElementById("complete_order").submit();
        } else {}
    }
</script>