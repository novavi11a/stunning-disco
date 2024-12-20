<?php

session_start();

if(isset($_SESSION['username']))
{

}else{
    header('location: login.php');
}

include "../init/connect.php";
include "../init/functions.php";


if (isset($_SESSION['username'])) {
    

    $transac = 'Order#'.$_GET['url'];
    
    $query = 'SELECT * FROM orders WHERE transacID = :transacID';
    $row = query($query,['transacID'=>$transac]);

    $query = 'SELECT * FROM transactions WHERE transacID = :transacID';
    $row2 = query($query,['transacID'=>$transac]);



    if (empty($row)) {
        echo "ERROR FETCHING DATA!!";
        die;
    }
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
    <title>Cakeasy Bakeshop | Checkout</title>


    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="../assets/css/nav.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/carousel.css">



</head>

<body class="align-items-center py-4 bg-body-tertiary">

    <main class="text-center m-5">
        <h1>Thank you for your Purchase!</h1>
        <h3>Your Order have been Successfully Placed!</h3>

        <div class="border rounded bg-light m-5" >
            <p class="p-3 text fs-5"><?=$row[0]['details']?></p>
        
            <p class="p-3 text fs-3">Total: <strong><?=$row[0]['amount']?></strong></p>
        

        
            <p class="mb-1 fs-4">Payment Method: </p>
            <p class="p-3 text fs-5"><?=$row2[0]['details']?></p>
        </div>

        <a class="btn btn-success" href="../../../index.php">Back to Home</a>
    </main>






    <script src="../assets/js/jquery-3.7.1.min.js"></script>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>







</body>

</html>