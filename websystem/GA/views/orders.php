<?php

session_start();

if(isset($_SESSION['username']))
{

}else{
    header('location: login.php');
}


include "../init/connect.php";
include "../init/functions.php";

require "../controllers/orders-controller.php";

$message = "";


if(isset($_SESSION['removeMessage']))
{
    $message = $_SESSION['removeMessage'];
    unset($_SESSION['removeMessage']);

}


?>

<!doctype html>
<html lang="en" data-bs-theme="light">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Cakeasy Bakeshop | Cart</title>


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
                <li><a href="home.php" class="nav-link px-2 ">Home</a></li>
                <li><a href="shop.php" class="nav-link px-2 ">Shop</a></li>
                
                <?php
            
            if(isset($_SESSION['username']))
            {
            
            ?>

                <li><a href="userCart.php" class="nav-link px-2 active">Cart<span id="cart-item" class="badge badge-danger">  </span></a></li>
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



        <!-- Marketing messaging and featurettes
================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->

        <div class="container marketing">

        <h1><?=$message?></h1>

            <!-- Three columns of text below the carousel -->

            <div class="row mb-5 text-center">

                <div id="message"></div>



            </div>

            <div class="row justify-content-center">


            <table class="table border border-5 rounded-3">
                <thead>
                    <tr>
                    <th scope="col">id</th>
                    <th scope="col">Details</th>
                    <th scope="col">Amount (Php)</th>
                    <th scope="col">Date</th>
                    <th scope="col">Transaction Code</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php include 'partials/ordersTable.php'; ?>
                </tbody>
            </table>


            </div><!-- /.row -->

            <!-- START THE FEATURETTES -->




            <hr class="featurette-divider">

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







    

    
   

</body>

</html>