<?php require_once('header.php'); ?>


<link href="assets/css/reviews.css" rel="stylesheet">


<?php


require_once('config.php');
if (isset($_GET['id'])) {

    $user_id = $_GET['id'];


    $user = $db->query("SELECT u.*,sp.* from user u , service_provider_profile sp WHERE u.user_id=sp.user_id and u.user_id= $user_id")[0];
    $check = 0;
}

$reviews = $db->query("SELECT sp.image as profile_image, review.review_id, user.username AS client, review.rating as star, review.review_text, review.created_at FROM service_provider_profile sp, review, user WHERE user.user_id=review.client_id and review.provider_id='$user_id' and sp.user_id=user.user_id");



?>
<link href="assets/css/profile.css" rel="stylesheet">

<section class="bg-light">
    <div class="container">
        <div class="row text-center py-5">
            <div class="col-12">
                <h2> Perfil de Proveedor</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-4 mb-sm-5">

                <div class="card card-style1 border-0">
                    <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">

                        <div class="row align-items-center">
                            <div class="col-lg-6 mb-4 mb-lg-0 text-center">
                                <img class=" rounded-circle img-thumbnail" width="200" src="uploads/profile/<?= $user['image'] ?>" alt="Not uploaded yet ">
                                <!-- <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="..."> -->
                            </div>
                            <div class="col-lg-6 px-xl-10">

                                <ul class="list-unstyled mb-1-9">
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text- me-2 font-weight-600">Nombre: </span><?= $user['username'] ?> </li>
                                    <!-- <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Company Name: </span><?= $user['company_name'] ?> </li> > -->
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Número de contacto: </span> <?= $user['phone_number'] ?></li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Dirección: </span> <?= $user['address'] ?></li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Ciudad: </span> <?= $user['city'] ?></li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Barrio: </span> <?= $user['state'] ?></li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">País: </span> <?= $user['country'] ?></li>

                                </ul>
                                <ul class="social-icon-style1 list-unstyled mb-0 ps-0">
                                    <li><a href="#!"><i class="ti-twitter-alt"></i></a></li>
                                    <li><a href="#!"><i class="ti-facebook"></i></a></li>
                                    <li><a href="#!"><i class="ti-pinterest"></i></a></li>
                                    <li><a href="#!"><i class="ti-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-lg-12 mb-4 mb-sm-5">
                <div>
                    <span class="section-title text-primary mb-3 mb-sm-4">Sobre mí: </span>
                    <p> <?= $user['additional_information'] ?></p>
                    <!-- <p class="mb-0">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed.</p> -->
                </div>
            </div>


            <div class="container">
                <div id="reviews" class="review-section">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h4 class="m-0"><?= count($reviews) ?> comentario(s) sobre este proveedor: </h4>
                    </div>
                    <!-- <div class="row">
                        <div class="col-md-6">
                            <table class="stars-counters">
                                <tbody>
                                    <tr class="">
                                        <td>
                                            <span>
                                                <button class="fit-button fit-button-color-blue fit-button-fill-ghost fit-button-size-medium stars-filter">5 Stars</button>
                                            </span>
                                        </td>
                                        <td class="progress-bar-container">
                                            <div class="fit-progressbar fit-progressbar-bar star-progress-bar">
                                                <div class="fit-progressbar-background">
                                                    <span class="progress-fill" style="width: 97.2973%;"></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="star-num">(36)</td>
                                    </tr>
                                    <tr class="">
                                        <td>
                                            <span>
                                                <button class="fit-button fit-button-color-blue fit-button-fill-ghost fit-button-size-medium stars-filter">5 Stars</button>
                                            </span>
                                        </td>
                                        <td class="progress-bar-container">
                                            <div class="fit-progressbar fit-progressbar-bar star-progress-bar">
                                                <div class="fit-progressbar-background">
                                                    <span class="progress-fill" style="width: 2.2973%;"></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="star-num">(2)</td>
                                    </tr>
                                    <tr class="">
                                        <td>
                                            <span>
                                                <button class="fit-button fit-button-color-blue fit-button-fill-ghost fit-button-size-medium stars-filter">5 Stars</button>
                                            </span>
                                        </td>
                                        <td class="progress-bar-container">
                                            <div class="fit-progressbar fit-progressbar-bar star-progress-bar">
                                                <div class="fit-progressbar-background">
                                                    <span class="progress-fill" style="width: 0;"></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="star-num">(0)</td>
                                    </tr>
                                    <tr class="">
                                        <td>
                                            <span>
                                                <button class="fit-button fit-button-color-blue fit-button-fill-ghost fit-button-size-medium stars-filter">5 Stars</button>
                                            </span>
                                        </td>
                                        <td class="progress-bar-container">
                                            <div class="fit-progressbar fit-progressbar-bar star-progress-bar">
                                                <div class="fit-progressbar-background">
                                                    <span class="progress-fill" style="width: 0;"></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="star-num">(0)</td>
                                    </tr>
                                    <tr class="">
                                        <td>
                                            <span>
                                                <button class="fit-button fit-button-color-blue fit-button-fill-ghost fit-button-size-medium stars-filter">5 Stars</button>
                                            </span>
                                        </td>
                                        <td class="progress-bar-container">
                                            <div class="fit-progressbar fit-progressbar-bar star-progress-bar">
                                                <div class="fit-progressbar-background">
                                                    <span class="progress-fill" style="width: 0;"></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="star-num">(0)</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <div class="ranking">
                                <h6 class="text-display-7">Rating Breakdown</h6>
                                <ul>
                                    <li>
                                        Seller communication level<span>5<span class="review-star rate-10 show-one"></span></span>
                                    </li>
                                    <li>
                                        Recommend to a friend<span>5<span class="review-star rate-10 show-one"></span></span>
                                    </li>
                                    <li>
                                        Service as described<span>4.9<span class="review-star rate-10 show-one"></span></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> -->
                </div>

                <div class="review-list">
                    <ul>
                        <?php foreach ($reviews as $key => $value) {
                            # code...
                        ?>
                            <li>
                                <div class="d-flex">
                                    <div class="left">
                                        <span>
                                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="profile-pict-img img-fluid" alt="" />
                                        </span>
                                    </div>
                                    <div class="right">
                                        <h4>
                                            <?= $value['client'] ?>
                                            <span class="gig-rating text-body-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" width="15" height="15">
                                                    <path fill="currentColor" d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z"></path>
                                                </svg>
                                                <?= $value['star'] ?>.0
                                            </span>
                                        </h4>
                                        <!-- <div class="country d-flex align-items-center">
                                            <span>
                                                <img class="country-flag img-fluid" src="https://bootdey.com/img/Content/avatar/avatar6.png" />
                                            </span>
                                            <div class="country-name font-accent">India</div>
                                        </div> -->
                                        <div class="review-description">
                                            <p>
                                                <?= $value['review_text'] ?>
                                            </p>
                                        </div>
                                        <span class="publish py-3 d-inline-block w-100">Published: <?= $value['created_at'] ?></span>

                                    </div>
                                </div>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>


            <!-- <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12 mb-4 mb-sm-5">

                        <div class="height-100 container d-flex justify-content-center align-items-center">

                            <div class="rate-card p-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="ratings">
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <h5 class="review-count">12 Reviews</h5>
                                </div>


                                <div class="mt-5 d-flex justify-content-between align-items-center">
                                    <h5 class="review-stat">Cleanliness</h5>
                                    <div class="small-ratings">
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>

                                </div>

                                <div class="mt-1 d-flex justify-content-between align-items-center">
                                    <h5 class="review-stat">Approachability of SLT</h5>
                                    <div class="small-ratings">
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>


                                <div class="mt-1 d-flex justify-content-between align-items-center">
                                    <h5 class="review-stat">Front Office</h5>
                                    <div class="small-ratings">
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>


                                <div class="mt-1 d-flex justify-content-between align-items-center">
                                    <h5 class="review-stat">CPD</h5>
                                    <div class="small-ratings">
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                    </div>
                                </div>


                                <div class="mt-1 d-flex justify-content-between align-items-center">
                                    <h5 class="review-stat">Pastrol</h5>
                                    <div class="small-ratings">
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>

                                <div class="mt-1 d-flex justify-content-between align-items-center">
                                    <h5 class="review-stat">Office Space</h5>
                                    <div class="small-ratings">
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div> -->
        </div>
    </div>
</section>



<?php require_once('footer.php') ?>