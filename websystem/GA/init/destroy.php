<?php

    session_start();

    session_unset();
    session_destroy();

    if($_GET['url'] == 'admin')
    {
        header('location: ../admin/index.php');
    }else{
        header('location: ../index.php');
    
    }