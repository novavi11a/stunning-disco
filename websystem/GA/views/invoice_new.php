<?php

session_start();

if(isset($_SESSION['username']))
{

}else{
   // header('location: login.php');
}

include "../init/connect.php";
include "../init/functions.php";


if (isset($_SESSION['username'])) {
    

    $transac = 'Order#'.$_GET['url'];
    
    $query = 'SELECT * FROM orders WHERE transacID = :transacID';
    $row = query($query,['transacID'=>$transac]);

    $query = 'SELECT * FROM transactions WHERE transacID = :transacID';
    $row2 = query($query,['transacID'=>$transac]);

    $detail = array();
    $orderCount = 0;
    $start = 1; // Position to start keeping characters (0-based index)
    $end = -1; // Position to stop keeping characters (negative index counts from the
    foreach ($row as $rows) {
        $order = $rows['details'];
        $orderDetail = explode("<br>",$order);

        foreach ($orderDetail as $details) {
            $trimmedStr = substr($details, $start, $end - $start);
            $detail[] = $trimmedStr;
        }
        print_r($detail);
    }

    
    

    

   // print_r($order_split);



    if (empty($row)) {
        echo "ERROR FETCHING DATA!!";
        die;
    }

    die;
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

    <style>
        .card{
            margin-left:300px;
            margin-right:300px;
        }

        /* Styles for screens smaller than 600px */
        @media only screen and (max-width: 600px) {
        .card {
            margin-left:100px;
            margin-right:100px;
        }
        }
    </style>



</head>

<body class="align-items-center py-4 bg-body-tertiary">
 
<div class="card">
  <div class="card-body mx-4">
    <div class="container">
      <p class="my-5 mx-5" style="font-size: 30px;">Thank for your purchase</p>
      <div class="row">
        <ul class="list-unstyled">
          <li class="text-black">John Doe</li>
          <li class="text-muted mt-1"><span class="text-black">Invoice</span> #12345</li>
          <li class="text-black mt-1">April 17 2021</li>
        </ul>
        <hr>
        <div class="col-xl-10">
          <p>Pro Package</p>
        </div>
        <div class="col-xl-2">
          <p class="float-end">$199.00
          </p>
        </div>
        <hr>
      </div>
      <div class="row">
        <div class="col-xl-10">
          <p>Consulting</p>
        </div>
        <div class="col-xl-2">
          <p class="float-end">$100.00
          </p>
        </div>
        <hr>
      </div>
      <div class="row">
        <div class="col-xl-10">
          <p>Support</p>
        </div>
        <div class="col-xl-2">
          <p class="float-end">$10.00
          </p>
        </div>
        <hr style="border: 2px solid black;">
      </div>
      <div class="row text-black">

        <div class="col-xl-12">
          <p class="float-end fw-bold">Total: $10.00
          </p>
        </div>
        <hr style="border: 2px solid black;">
      </div>
      <div class="text-center" style="margin-top: 90px;">
        <a><u class="text-info">View in browser</u></a>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
      </div>

    </div>
  </div>
</div>






    <script src="../assets/js/jquery-3.7.1.min.js"></script>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>







</body>

</html>