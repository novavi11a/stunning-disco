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



if (isset($_POST["submit"])) {

  $error = [];
  $data = [];
  $result = [];
  $name = $_POST['name'];
  $desc = $_POST['description'];
  $cat = $_POST['category'];
  $price = $_POST['price'];
  $quantity = $_POST['quantity'];
  $id = $_POST['id'];


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


    if(!empty($_FILES["fileToUpload"]["name"]))
    {

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
        } else {
            echo "Sorry, there was an error uploading your file.";
        }

        }
    }

      $data['name'] = $name;
      $data['description'] = $desc;
      $data['category'] = $cat;
      $data['price'] = $price;
      $data['quantity'] = $quantity;

      if(!empty($_FILES["fileToUpload"]["name"]))
      {
        $data['fileLoc'] = $target_file;
        $query = 'UPDATE items SET name = :name, description = :description, category = :category, price = :price, quantity = :quantity, fileLoc = :fileLoc WHERE id = :id limit 1';
      }else{
        $query = 'UPDATE items SET name = :name, description = :description, category = :category, price = :price, quantity = :quantity  WHERE id = :id limit 1';
      }
      $data['id'] = $id;

      query($query,$data);

        goto_page();
 
  }
}




function goto_page() {

    unset($_POST);
           
    echo '<script>';
    echo 'alert("EDIT SAVED!!");'; // Customize your alert message
    echo 'window.location.href = "inventory.php";'; // Redirect to abc.php
    echo '</script>';

}
