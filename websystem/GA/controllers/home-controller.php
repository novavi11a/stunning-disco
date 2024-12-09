<?php
session_start();

include "../init/connect.php";
include "../init/functions.php";



if(isset($_POST['pid']) && isset($_SESSION['username']))
{

    $orderCode = $_SESSION['username'];

    $query = 'SELECT * FROM items WHERE id = :id limit 1';
    $row = query($query,['id'=>$_POST['pid']]);
    
    $query = 'SELECT * FROM cart WHERE itemID = :itemID AND orderCode = :orderCode limit 1';
    $itemExist = query($query,['itemID'=>$_POST['pid'],'orderCode'=>$orderCode]);




    $errorMsg = [];
    $data=[];

    if(empty($row))
    {
        $errorMsg['err'] = 'No such item';
    }

    if($row[0]['status'] == 'Archived')
    {
        $errorMsg['err'] = 'This Item is NOT AVAILABLE:';
    }

    if($row[0]['quantity'] <= 0)
    {
        $errorMsg['err'] = 'Our apologies, we\'re out of stock for this one.';
    }

    if(!empty($itemExist))
    {
        $errorMsg['err'] = 'Woops, you\'ve already added this to your Cart.';
    }

    if(empty($errorMsg))
    {
        $data['orderCode'] = $_SESSION['username'];
        $data['itemID'] = $row[0]['id'];
        $data['itemPrice'] = $row[0]['price'];
        $data['itemQnty'] = 1;
        $query = 'INSERT INTO cart (orderCode, itemID, itemPrice, itemQnty) VALUES (:orderCode, :itemID, :itemPrice, :itemQnty)';
        query($query,$data);

        echo '<script>alert("Item Added to your Cart");</script>';

    }else{
        echo '<script>alert("'.$errorMsg['err'].'");</script>';
    }

    


}

if(isset($_GET['cartItem']) && isset($_SESSION['username']))
{
    if($_GET['cartItem']=='cartItem')
    {
        $query = 'SELECT * FROM cart WHERE orderCode = :orderCode';
        $row = query($query,['orderCode'=>$_SESSION['username']]);

        echo count($row);
    }
}

if(isset($_GET['url']))
{
    if($_GET['url'] == 'notLogin')
    {
        echo "<script type='text/javascript'>alert('Please Log in/Sign up to your Account');</script>";
    }
}



