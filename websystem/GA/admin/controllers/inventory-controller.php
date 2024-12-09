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



if(isset($_GET['url']))
{
  if ($_GET['url'] == 'archive') {
    $query = 'UPDATE items SET status = "Archived" WHERE id = :id';
    query($query,['id'=>$_GET['id']]);

  }
}


if (isset($_POST["submit"])) {

  $error = [];
  $data = [];
  $result = [];
  $name = $_POST['name'];
  $desc = $_POST['description'];
  $cat = $_POST['category'];
  $price = $_POST['price'];
  $quantity = $_POST['quantity'];


  if (!isset($_FILES["fileToUpload"])) {
    $errors['fileToUpload'] = 'border border-danger';
  }

  if (empty($name)) {
    $errors['name'] = 'border border-danger';
  }

  if (empty($desc)) {
    $errors['description'] = 'border border-danger';
  }

  if (empty($cat)) {
    $errors['category'] = 'border border-danger';
  }

  if (empty($price)) {
    $errors['price'] = 'border border-danger';
  }

  if (empty($quantity)) {
    $errors['quantity'] = 'border border-danger';
  }

  if (empty($errors)) {

    $imgID = rand(0000, 9999);

    $target_dir = "../../assets/img/items/";
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));

    $target_file = $target_dir . $_POST['name'] . $imgID . '.' . $imageFileType;

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

    if ($check !== false) {
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }

    if ($uploadOk == 1) {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        
        $data['name'] = $name;
        $data['description'] = $desc;
        $data['category'] = $cat;
        $data['price'] = $price;
        $data['quantity'] = $quantity;
        $data['fileLoc'] = $target_file;

        $query = 'INSERT INTO items (name, description, category, price, quantity, fileLoc) VALUES (:name, :description, :category, :price, :quantity, :fileLoc)';
        query($query,$data);
       
        echo "<script> alert('ITEM SUCCESSFULLY ADDED!!'); </script>";
        
        unset($_POST);
       

      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
  }
}
