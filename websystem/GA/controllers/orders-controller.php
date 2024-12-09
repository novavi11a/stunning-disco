<?php

if(isset($_POST['submit']))
{
    if($_POST['submit'] == 'cancel')
    {
        
        $query = "UPDATE orders SET status = 'Canceled' WHERE transacID = :transacID";
        query($query,['transacID'=>$_POST['transacID']]);

    }
}


?>