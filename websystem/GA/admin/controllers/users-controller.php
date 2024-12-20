<?php



if(isset($_SESSION))
{
  if($_SESSION['role'] == 'admin')
  {
   
  }else{
    header('location: ../views/login.php');
  }
}

if (isset($_GET['url'])) {
    if ($_GET['url'] == 'archive') {
        $query = 'UPDATE users SET status = "Archived" WHERE id = :id';
        query($query, ['id' => $_GET['id']]);
        goto_page();
    }
    if ($_GET['url'] == 'restore') {
        $query = 'UPDATE users SET status = "Active" WHERE id = :id';
        query($query,['id'=>$_GET['id']]);
        goto_page();
    
      }
    
      
}

if (isset($_POST["submit"])) {

    $error = [];
    $data = [];
    $result = [];

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


        $newPass = password_hash($password, PASSWORD_BCRYPT);

        $data['username'] = $username;
        $data['email'] = $email;
        $data['fName'] = $fName;
        $data['lName'] = $lName;
        $data['pass'] = $newPass;
        $data['role'] = 'user';
        $data['status'] = 'Active';


        $query = 'INSERT INTO users (username, email, firstname, lastname, password, role, status)
                VALUES (:username, :email, :fName, :lName, :pass, :role, :status)';



        query($query, $data);

        goto_page();
    }
}




function goto_page()
{

    unset($_POST);

    echo '<script>';
    echo 'alert("SAVED CHANGES!!");'; // Customize your alert message
    echo 'window.location.href = "users.php";'; // Redirect to abc.php
    echo '</script>';
}
