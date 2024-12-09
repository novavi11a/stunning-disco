<?php

    include "../init/connect.php";
    include "../init/functions.php";

    require "../controllers/signup-controller.php";

?>



<!doctype html>
<html lang="en" data-bs-theme="light">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Cakeasy Bakeshop | Signup</title>


    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="../assets/css/sign-in.css" rel="stylesheet">

    
    

</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">

    <main class="form-signin w-100 m-auto text-center">
        <form method="post">

           

            <img class="" src="../assets/img/cakeasy_logo.png" alt="" width="200" height="auto">
            <h1 class="h3 mb-3 fw-normal">Create new Account</h1>

            <?php if(!empty($errors)):?>
            <div class="alert alert-danger">Please Fill in all Fields</div>
            <?php endif;?>

            <div class="form-floating">
                <input type="text" value="<?=old_value('username')?>" name="username" class="form-control
                <?php
                    if(!empty($errors['username']))
                    {
                        echo $errors['username'];
                    }else { echo ""; }
                ?>
                " id="floatingInput" placeholder="Username">
                <label for="floatingInput">Username</label>
            </div>

            <div class="form-floating">
                <input type="email" value="<?=old_value('email')?>"name="email" class="form-control 
                <?php
                    if(!empty($errors['email']))
                    {
                        echo $errors['email'];
                    }else { echo ""; }
                ?>" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>

            <div class="form-floating">
                <input type="text" value="<?=old_value('fName')?>" name="fName" class="form-control <?php
                    if(!empty($errors['fName']))
                    {
                        echo $errors['fName'];
                    }else { echo ""; }
                ?>" id="floatingInput" placeholder="First Name">
                <label for="floatingInput">First Name</label>
            </div>

            <div class="form-floating">
                <input type="text" value="<?=old_value('lName')?>" name="lName" class="form-control
                <?php
                    if(!empty($errors['lName']))
                    {
                        echo $errors['lName'];
                    }else { echo ""; }
                ?>" id="floatingInput" placeholder="Last Name">
                <label for="floatingInput">Last Name</label>
            </div>

            <div class="form-floating">
                <input type="password" name="pass" class="form-control
                <?php
                    if(!empty($errors['pass']))
                    {
                        echo $errors['pass'];
                    }else { echo ""; }
                ?>" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <?php if(!empty($errors['unMatch'])):?>
            <div class="alert alert-warning"><?=$errors['unMatch']?></div>
            <?php endif;?>

            <div class="form-floating">
                <input type="password" name="rePass" class="form-control
                <?php
                    if(!empty($errors['rePass']))
                    {
                        echo $errors['rePass'];
                    }else { echo ""; }
                ?>" id="floatingPassword" placeholder="Repeat Password">
                <label for="floatingPassword">Repeat Password</label>
            </div>

            <div class="form-check text-start my-3">
                <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Remember me
                </label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit" name="submit">Sign in</button>

            
            <p class="mt-5 mb-3 text-body-secondary"><a href="login.php">Already have an Account?</a></p>

            <p class="mt-5 mb-3 text-body-secondary">&copy; 2024</p>
        </form>
    </main>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>