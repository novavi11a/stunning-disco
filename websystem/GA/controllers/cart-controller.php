<?php

session_start();

include "../init/connect.php";
include "../init/functions.php";

    if(isset($_POST['qty']))
    {

        $data = [];

        $total =  $_POST['pprice'] * $_POST['qty'];
        echo $total;

        $data['itemQnty'] = $_POST['qty'];
        $data['itemPrice'] = $total;
        $data['id'] = $_POST['pid'];

        if($data['itemQnty'] > $_POST['maxQ'])
        {
            echo "<script> alert('Oh no! We don\'t have enough stock for you right now.'); </script>";
            
        }else{
            $query = 'UPDATE cart SET itemQnty = :itemQnty, itemPrice = :itemPrice WHERE id = :id';
            query($query,$data);
        }



        
    }

    

    if(isset($_GET['remove']))
    {
        $pid = $_GET['remove'];
        $query = 'DELETE FROM cart WHERE id = :id';
        query($query,['id'=>$pid]);

        $_SESSION['removeMessage'] = "SUCCESSFULLY REMOVED!";

        header('location: ../views/userCart.php');

    }
