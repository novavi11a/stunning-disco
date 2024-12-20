<?php


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

    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $password = $_POST['pass'];

    if (empty($username)) {
        $errors['username'] = "border border-danger";
    }

    if (empty($email)) {
        $errors['email'] = "border border-danger";
    }

    if (empty($fName)) {
        $errors['fName'] = "border border-danger";
    }

    if (empty($lName)) {
        $errors['lName'] = "border border-danger";
    }

    if (empty($password)) {
        $errors['pass'] = "border border-danger";
    }

    if (empty($_POST['rePass'])) {
        $errors['rePass'] = "border border-danger";
    } else {
        if ($password != $_POST['rePass']) {
            $errors['pass'] = "border border-warning";
            $errors['rePass'] = "border border-warning";
            $errors['unMatch'] = 'Password did not Match';
        }
    }




    if (empty($errors)) {

        if($_POST['isPasswordChange'] == 'true')
        {
            $newPass = password_hash($password, PASSWORD_BCRYPT);
        }else{
            $newPass = $password;
        }

        

        $data['username'] = $username;
        $data['email'] = $email;
        $data['fName'] = $fName;
        $data['lName'] = $lName;
        $data['pass'] = $newPass;
        $data['id'] = $_POST['id'];

        $query = 'UPDATE users SET username = :username, email = :email, firstname = :fName, lastname = :lName, password = :pass WHERE id = :id limit 1';



       query($query, $data);

       goto_page();


    }

    
}




function goto_page()
{

    unset($_POST);

    echo '<script>';
    echo 'alert("EDIT SAVED!!");'; // Customize your alert message
    echo 'window.location.href = "users.php";'; // Redirect to abc.php
    echo '</script>';
}
