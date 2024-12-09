<?php
    
    session_start();

    include '../init/functions.php';
    include '../init/connect.php';


    create_tables();

    if(isset($_SESSION['role']))
    {
        if($_SESSION['role'] == 'admin')
        {
            header('location: ./views/dashboard.php');
        }else{
            echo "<h1 class='text-center text-danger'>Invalid Credentials</h1>";
            die;
        }
        
    }else{
        header('location: ./views/login.php');
    }

    


?>