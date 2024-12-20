<?php

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'cakeasy_db';

$conn = mysqli_connect($hostname, $username, $password, $database);

if(!$conn)
{
    echo "CANNOT ESTABLISH CONNECTON TO THE DATABASE";
}else{

}