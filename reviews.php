<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif
    }

    body {
        background-color: #0ff
    }

    .container {
        background-color: rgb(232, 242, 245);
        padding: 50px 40px 20px;
        margin-top: 20px;
        margin-bottom: 20px;
        overflow: hidden;
        box-shadow: 5px 5px 25px #a7a7a7
    }

    .tag {
        text-align: center;
        font-size: 1.1rem
    }

    .fa-heart {
        color: rgba(255, 230, 0, 0.959);
        font-size: 30px
    }

    .card {
        height: 320px;
        padding: 10px 20px;
        border: none;
        box-shadow: -1px 3px 5px #a7a7a7
    }

    .testimonial {
        font-size: 0.9rem;
        line-height: 1.4rem;
        font-weight: 500
    }

    .active-star {
        color: #FBC02D;
        margin-bottom: 8px
    }

    .active-star:hover {
        color: #F9A825;
        cursor: pointer
    }

    .profile {
        padding-top: 10px
    }

    .name {
        font-weight: 700
    }

    .designation {
        font-size: 0.84rem;
        font-weight: 600
    }

    .owl-carousel {
        margin-bottom: 15px
    }

    .owl-carousel .owl-stage-outer {
        padding: 40px 10px;
        height: 380px
    }

    .owl-carousel .owl-item img {
        width: 45px !important;
        height: 45px;
        border-radius: 50%;
        object-fit: cover
    }

    .owl-theme .owl-nav [class*='owl-'] {
        border-radius: 50% !important;
        background: inherit !important;
        border: 3px solid #bbb;
        color: #bbb !important
    }

    .owl-theme .owl-nav [class*='owl-']:hover {
        border: 3px solid #1010ca;
        color: #1010ca !important
    }

    @media(max-width: 575.5px) {
        .container {
            margin: 0px;
            padding: 20px
        }
    }
</style>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
<div class="container rounded">
    <div class="d-flex justify-content-center fas fa-heart"></div>
    <p class="tag">Our customers love</p>
    <h1 class="text-primary text-center head">What we do</h1>
    <div class="owl-carousel owl-theme">
        <div class="owl-item">
            <div class="card d-flex flex-column">
                <div class="mt-2"> <span class="fas fa-star active-star"></span> <span class="fas fa-star active-star"></span> <span class="fas fa-star active-star"></span> <span class="fas fa-star active-star"></span> <span class="fas fa-star-half-alt active-star"></span> </div>
                <div class="main font-weight-bold pb-2 pt-1">Great Service</div>
                <div class="testimonial"> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Magni dolores molestias veniam inventore itaque eius iure omnis, temporibus culpa id. </div>
                <div class="d-flex flex-row profile pt-4 mt-auto"> <img src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="" class="rounded-circle">
                    <div class="d-flex flex-column pl-2">
                        <div class="name">Megan</div>
                        <p class="text-muted designation">CEO of My Company</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-item">
            <div class="card d-flex flex-column">
                <div class="mt-2"> <span class="fas fa-star active-star"></span> <span class="fas fa-star active-star"></span> <span class="fas fa-star active-star"></span> <span class="fas fa-star active-star"></span> <span class="fas fa-star-half-alt active-star"></span> </div>
                <div class="main font-weight-bold pb-2 pt-1">Great Service</div>
                <div class="testimonial"> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Magni dolores molestias veniam inventore itaque eius iure omnis, temporibus culpa id. </div>
                <div class="d-flex flex-row profile pt-4 mt-auto"> <img src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="" class="rounded-circle">
                    <div class="d-flex flex-column pl-2">
                        <div class="name">Megan</div>
                        <p class="text-muted designation">CEO of My Company</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-item">
            <div class="card d-flex flex-column">
                <div class="mt-2"> <span class="fas fa-star active-star"></span> <span class="fas fa-star active-star"></span> <span class="fas fa-star active-star"></span> <span class="fas fa-star active-star"></span> <span class="fas fa-star-half-alt active-star"></span> </div>
                <div class="main font-weight-bold pb-2 pt-1">Great Service</div>
                <div class="testimonial"> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Magni dolores molestias veniam inventore itaque eius iure omnis, temporibus culpa id. </div>
                <div class="d-flex flex-row profile pt-4 mt-auto"> <img src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="" class="rounded-circle">
                    <div class="d-flex flex-column pl-2">
                        <div class="name">Megan</div>
                        <p class="text-muted designation">CEO of My Company</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-item">
            <div class="card d-flex flex-column">
                <div class="mt-2"> <span class="fas fa-star active-star"></span> <span class="fas fa-star active-star"></span> <span class="fas fa-star active-star"></span> <span class="fas fa-star active-star"></span> <span class="fas fa-star-half-alt active-star"></span> </div>
                <div class="main font-weight-bold pb-2 pt-1">Great Service</div>
                <div class="testimonial"> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Magni dolores molestias veniam inventore itaque eius iure omnis, temporibus culpa id. </div>
                <div class="d-flex flex-row profile pt-4 mt-auto"> <img src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="" class="rounded-circle">
                    <div class="d-flex flex-column pl-2">
                        <div class="name">Megan</div>
                        <p class="text-muted designation">CEO of My Company</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-item">
            <div class="card d-flex flex-column">
                <div class="mt-2"> <span class="fas fa-star active-star"></span> <span class="fas fa-star active-star"></span> <span class="fas fa-star active-star"></span> <span class="fas fa-star active-star"></span> <span class="fas fa-star-half-alt active-star"></span> </div>
                <div class="main font-weight-bold pb-2 pt-1">Great Service</div>
                <div class="testimonial"> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Magni dolores molestias veniam inventore itaque eius iure omnis, temporibus culpa id. </div>
                <div class="d-flex flex-row profile pt-4 mt-auto"> <img src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="" class="rounded-circle">
                    <div class="d-flex flex-column pl-2">
                        <div class="name">Megan</div>
                        <p class="text-muted designation">CEO of My Company</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<script>
    $(document).ready(function() {
        var silder = $(".owl-carousel");
        silder.owlCarousel({
            autoPlay: false,
            items: 1,
            center: false,
            nav: true,
            margin: 40,
            dots: false,
            loop: true,
            navText: ["<i class='fa fa-arrow-left' aria-hidden='true'></i>", "<i class='fa fa-arrow-right' aria-hidden='true'></i>"],
            responsive: {
                0: {
                    items: 1,
                },
                575: {
                    items: 1
                },
                768: {
                    items: 2
                },
                991: {
                    items: 3
                },
                1200: {
                    items: 4
                }
            }
        });
    });
</script>