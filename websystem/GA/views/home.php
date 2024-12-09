<?php

session_start();

include "../init/connect.php";
include "../init/functions.php";


?>

<!doctype html>
<html lang="en" data-bs-theme="light">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Cakeasy Bakeshop | Home</title>


    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="../assets/css/nav.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/carousel.css">



</head>

<body class="align-items-center py-4 bg-body-tertiary">

    <main>

        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between pb-3 mb-4 border-bottom">

            <div class="col-md-3 mb-2 mb-md-0">
                <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                    <h3 class="ml-5">CAKEASY CakeShop</h3>
                </a>
            </div>

            <ul class="nav nav-pills nav-fill col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 active">Home</a></li>
                <li><a href="shop.php" class="nav-link px-2">Shop</a></li>
                


            <?php
            
            if(isset($_SESSION['username']))
            {
            
            ?>

                <li><a href="userCart.php" class="nav-link px-2">Cart<span id="cart-item" class="badge badge-danger">  </span></a></li>
                <li><a href="orders.php" class="nav-link px-2">Orders</a></li>


            <?php
            }
            ?>


            </ul>


            <?php
            if (isset($_SESSION['username'])) {
            ?>

                <div class="col-md-1 text-end">

                    <div class="dropdown text-end">
                        <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu text-small">
                            
                            <li><a class="dropdown-item" href="../init/destroy.php">Sign out</a></li>
                        </ul>
                    </div>
                </div>

            <?php } else { ?>

                <div class="col-md-3 text-end">
                    <button type="button" class="btn btn-outline-primary me-2"><a href="../index.php?url=login">Login</a></button>
                    <button type="button" class="btn btn-primary"><a href="../index.php?url=signup">Sign-up</a></button>
                </div>


            <?php } ?>
        </header>

        <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">

                    <div class="bd-placeholder-img">
                        <img class="imageA" src="../assets/img/cakeItEasy.png" alt="carouselA" width="100%" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                    </div>


                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1>Welcome To CAKEASY Bakeshop</h1>
                            <p class="opacity-75">Sweet Moments, Made Easy</p>
                            <p><a class="btn btn-lg btn-primary" href="../views/signup.php">Sign up today</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                <div class="bd-placeholder-img">
                        <img class="imageA" src="../assets/img/caroucel2.jpg" alt="carouselA" width="100%" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                    </div>
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Baking Happiness, One Cake at a Time</h1>
                            <p>Indulge in our delightful range of cakes, pastries, and baked goods, all crafted with love and the finest ingredients. Visit our shop page to explore our mouth-watering creations and place your order today!</p>
                            <p><a class="btn btn-lg btn-primary" href="../views/shop.php">Go to Shop</a></p>
                        </div>
                    </div>
                </div>
                
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


        <!-- Marketing messaging and featurettes
================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->

        <div class="container marketing">

            <!-- Three columns of text below the carousel -->

            <div class="row mb-5 text-center">

            <div id="message"></div>

                <h3>Hot Picks</h3>

            </div>

            <div class="row justify-content-center">

                <?php

                    include "./partials/items.php";


                ?>

            </div><!-- /.row -->


            <!-- START THE FEATURETTES -->

           

            <!-- /END THE FEATURETTES -->

        </div><!-- /.container -->
            


            

        <!-- FOOTER -->
        <footer class="container">
            <p class="float-end"><a href="#">Back to top</a></p>
            <p>&copy; 2024 Cakeasy Bakeshop, Inc. &middot;</p>
        </footer>




    </main>


    
        


    <script src="../assets/js/jquery-3.7.1.min.js"></script>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>


    
    

    <script>


        $(document).ready(function(){
            $('.addItemBtn').click(function(e){

                e.preventDefault();

                var $form = $(this).closest('.form-submit');
                var pid = $form.find('.itemID').val();


                $.ajax({
                    url: '../controllers/home-controller.php',
                    method: 'POST',
                    data: {pid: pid},

                    success : function(response)
                    {
                        $('#message').html(response);
                        load_cart_item_number();
                    }
                    
                });

            
       
                
            })
        });

        $(document).ready(function(){
            $('.login').click(function(e){

                e.preventDefault();

                $.ajax({
                    url: '../controllers/home-controller.php',
                    method: 'GET',
                    data: {url: 'notLogin'},

                    success : function(response)
                    {
                        $('#message').html(response);
                    }
                    
                });

            
       
                
            })
        });

        load_cart_item_number();
        function load_cart_item_number()
            {
                $.ajax({
                    url: '../controllers/home-controller.php',
                    method: 'GET',
                    data: {cartItem: 'cartItem'},

                    success : function(response)
                    {
                        $('#cart-item').html(response);
                    }
                    
                });
            }

        
    </script>

</body>

</html>