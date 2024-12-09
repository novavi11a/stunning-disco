<?php

//Remembers old value of Input if error uccured while posting

function create_tables()
{
    $string = 'mysql:HOSTNAME=localhost;dbname=cakeasy_db';
    $conn = new PDO($string, 'root', '');


    $query = "CREATE TABLE IF NOT EXISTS `cart` (
        `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
        `orderCode` varchar(255) NOT NULL,
        `itemID` int(255) NOT NULL,
        `itemPrice` decimal(10,2) NOT NULL,
        `itemQnty` int(255) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";


    $stmt = $conn->prepare($query);
    $stmt->execute();

    $query = "CREATE TABLE IF NOT EXISTS`items` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(50) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fileLoc` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `score` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";


    $stmt = $conn->prepare($query);
    $stmt->execute();

    $query = "CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `details` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `address` varchar(255) NOT NULL,
  `transacID` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";


    $stmt = $conn->prepare($query);
    $stmt->execute();


    $query = "CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `transacID` varchar(255) NOT NULL,
  `payMethod` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";


    $stmt = $conn->prepare($query);
    $stmt->execute();


    $query = "CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";


    $stmt = $conn->prepare($query);
    $stmt->execute();

    $query = "INSERT INTO users (`username`, `email`, `firstname`, `lastname`, `password`, `role`, `status`)
    SELECT
    'Admin', 'admin@admin.admin', 'admin', 'admin', '$2y$10$6tS7L4zkOsttymWpzgWJKexWzTV/NIBzsj3vlYA2R2jNrVm79ZbxK', 'admin', 'Active'
    WHERE NOT EXISTS ( SELECT 1 FROM users WHERE username = 'Admin' AND email = 'admin@admin.admin');";

    $stmt = $conn->prepare($query);
    $stmt->execute();

    $query = "INSERT INTO items (`name`, `category`, `price`, `quantity`, `fileLoc`, `status`)
    SELECT
    'Strawberry Cake','Cake',749.0,10,'../../assets/img/items/1.png','Active'
    WHERE NOT EXISTS ( SELECT 1 FROM items WHERE name = 'Strawberry Cake');";

    $stmt = $conn->prepare($query);
    $stmt->execute();

    $query = "INSERT INTO items (`name`, `category`, `price`, `quantity`, `fileLoc`, `status`)
    SELECT
    'Chocolate Fluff Cake','Cake',749.0,10,'../../assets/img/items/2.png','Active'
    WHERE NOT EXISTS ( SELECT 1 FROM items WHERE name = 'Chocolate Fluff Cake');";

    $stmt = $conn->prepare($query);
    $stmt->execute();

    $query = "INSERT INTO items (`name`, `category`, `price`, `quantity`, `fileLoc`, `status`)
    SELECT
    'Black Forest Dark Chocolate Cake','Cake',799.0,10,'../../assets/img/items/3.png','Active'
    WHERE NOT EXISTS ( SELECT 1 FROM items WHERE name = 'Black Forest Dark Chocolate Cake');";

    $stmt = $conn->prepare($query);
    $stmt->execute();

    $query = "INSERT INTO items (`name`, `category`, `price`, `quantity`, `fileLoc`, `status`)
    SELECT
    'Blackout Chocolate Crunch Cake','Cake',849.0,10,'../../assets/img/items/4.png','Active'
    WHERE NOT EXISTS ( SELECT 1 FROM items WHERE name = 'Blackout Chocolate Crunch Cake');";

    $stmt = $conn->prepare($query);
    $stmt->execute();

    $query = "INSERT INTO items (`name`, `category`, `price`, `quantity`, `fileLoc`, `status`)
    SELECT
    'Chocolate Mousse Cake','Cake',899.0,10,'../../assets/img/items/5.png','Active'
    WHERE NOT EXISTS ( SELECT 1 FROM items WHERE name = 'Chocolate Mousse Cake');";

    $stmt = $conn->prepare($query);
    $stmt->execute();

    $query = "INSERT INTO items (`name`, `category`, `price`, `quantity`, `fileLoc`, `status`)
    SELECT
    'Strawberry Celebration Cake','Cake',949.0,10,'../../assets/img/items/6.png','Active'
    WHERE NOT EXISTS ( SELECT 1 FROM items WHERE name = 'Strawberry Celebration Cake');";

    $stmt = $conn->prepare($query);
    $stmt->execute();

    $query = "INSERT INTO items (`name`, `category`, `price`, `quantity`, `fileLoc`, `status`)
    SELECT
    'Vintage Strawberry Cheesecake','Cake',789.0,10,'../../assets/img/items/7.png','Active'
    WHERE NOT EXISTS ( SELECT 1 FROM items WHERE name = 'Vintage Strawberry Cheesecake');";

    $stmt = $conn->prepare($query);
    $stmt->execute();

    $query = "INSERT INTO items (`name`, `category`, `price`, `quantity`, `fileLoc`, `status`)
    SELECT
    'Strawberry Velvet Shortcake','Cake',189.0,10,'../../assets/img/items/8.png','Active'
    WHERE NOT EXISTS ( SELECT 1 FROM items WHERE name = 'Strawberry Velvet Shortcake');";

    $stmt = $conn->prepare($query);
    $stmt->execute();

    
}


function old_value($key)
{
    if (!empty($_POST[$key]))
        return $_POST[$key];
    return "";
}

function query($query, array $data = [])
{


    $string = 'mysql:HOSTNAME=localhost;dbname=cakeasy_db';
    $conn = new PDO($string, 'root', '');


    $stmt = $conn->prepare($query);
    $stmt->execute($data);

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (is_array($result) && !empty($data)) {
        return $result;
    }

    return false;
}

function query_row($query)
{


    $string = 'mysql:HOSTNAME=localhost;dbname=cakeasy_db';
    $conn = new PDO($string, 'root', '');


    $stmt = $conn->prepare($query);
    $stmt->execute();


    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (is_array($result)) {
        return $result;
    }

    return false;
}
