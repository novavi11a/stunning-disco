<?php

session_start();

include 'init/functions.php';


create_tables();

$location = './views/';


if(isset($_GET))
{
    if($_GET['url'] == '')
    {
        header('location: '.$location.'home.php');
    }
    else
    {
        header('location: '.$location.$_GET['url'].'.php');
    }
    
}





?>