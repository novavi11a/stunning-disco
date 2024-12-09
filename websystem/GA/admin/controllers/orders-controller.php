<?php

session_start();

if(isset($_SESSION))
{
  if($_SESSION['role'] == 'admin')
  {
   
  }else{
    header('location: ../views/login.php');
  }
}


include "../../init/connect.php";
include "../../init/functions.php";

if(isset($_POST))
{
    $orderCode = $_POST['orderCode'];

    if($_POST['submit']=="ship")
    {
        $query =  "UPDATE orders SET status = 'Shipped' WHERE transacID = :transacID";
        query($query, ['transacID'=>$orderCode]);
    }
    if($_POST['submit']=="cancel")
    {
        $query =  "UPDATE orders SET status = 'Canceled' WHERE transacID = :transacID";
        query($query, ['transacID'=>$orderCode]);
    }

    goto_page();
}

function goto_page()
{

    unset($_POST);

    echo '<script>';
    echo 'alert("CHANGES SAVED!!");'; // Customize your alert message
    echo 'window.location.href = "../views/orders.php";'; // Redirect to abc.php
    echo '</script>';
}