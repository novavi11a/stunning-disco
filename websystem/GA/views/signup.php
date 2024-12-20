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

            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">Please Fill in all Fields</div>
            <?php endif; ?>



            <div class="form-floating">
                <input type="text" value="<?= old_value('username') ?>" name="username" class="form-control
                <?php
                if (!empty($errors['username'])) {
                    echo $errors['username'];
                } else {
                    echo "";
                }
                ?>
                " id="floatingInput" placeholder="Username">
                <label for="floatingInput">Username</label>
            </div>

            <div class="form-floating">
                <input type="email" value="<?= old_value('email') ?>" name="email" class="form-control 
                <?php
                if (!empty($errors['email'])) {
                    echo $errors['email'];
                } else {
                    echo "";
                }
                ?>" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>

            <div class="form-floating">
                <input type="text" value="<?= old_value('fName') ?>" name="fName" class="form-control <?php
                                                                                                        if (!empty($errors['fName'])) {
                                                                                                            echo $errors['fName'];
                                                                                                        } else {
                                                                                                            echo "";
                                                                                                        }
                                                                                                        ?>" id="floatingInput" placeholder="First Name">
                <label for="floatingInput">First Name</label>
            </div>

            <div class="form-floating">
                <input type="text" value="<?= old_value('lName') ?>" name="lName" class="form-control
                <?php
                if (!empty($errors['lName'])) {
                    echo $errors['lName'];
                } else {
                    echo "";
                }
                ?>" id="floatingInput" placeholder="Last Name">
                <label for="floatingInput">Last Name</label>
            </div>

            <div class="form-floating">
                <input type="password" name="pass" class="form-control
                <?php
                if (!empty($errors['pass'])) {
                    echo $errors['pass'];
                } else {
                    echo "";
                }
                ?>" oninput="passValid()" onsubmit="return passValid()" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <div id="passMsg" style="display:none;">

                <ul>
                    <li id="passErr1" class ="text-danger">Must be 8 Characters</li>
                    <li id="passErr2" class ="text-danger">Must have Uppercase Letters</li>
                    <li id="passErr3" class ="text-danger">Must have Lowercase Letters</li>
                    <li id="passErr4" class ="text-danger">Must have Special Characters</li>
                </ul>
                
            </div>

            <?php if (!empty($errors['unMatch'])): ?>
                <div class="alert alert-warning"><?= $errors['unMatch'] ?></div>
            <?php endif; ?>

            <div class="form-floating">
                <input type="password" name="rePass" class="form-control
                <?php
                if (!empty($errors['rePass'])) {
                    echo $errors['rePass'];
                } else {
                    echo "";
                }
                ?>" oninput="passMatch()" id="floatingPassword" placeholder="Repeat Password">
                <label for="floatingPassword">Repeat Password</label>
            </div>

            <div id="rePassMsg">

                    <p style="display:none;" class ="text-success">Password Matched!!</p>
                    <p style="display:none;" class ="text-danger">Password didn't Match!!</p>
                
            </div>

            
            <button class="btn btn-primary w-100 py-2" type="submit" name="submit">Sign in</button>


            <p class="mt-5 mb-3 text-body-secondary"><a href="login.php">Already have an Account?</a></p>

            <p class="mt-5 mb-3 text-body-secondary">&copy; 2024</p>
        </form>
    </main>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>


    <script>
        function passValid() {

            var passArr = [];
            var passElements = document.getElementsByName('pass');
            var messageElem = document.getElementById("passMsg");
            let passOK = false;
    

            for (var i = 0; i < passElements.length; i++) {
                passArr.push(passElements[i].value);
            }

            var finalPass = passArr.join();
            console.log(finalPass);
            console.log(finalPass.length);

            

            var lengthCriteria = finalPass.length >= 8;
            var uppercaseCriteria = /[A-Z]/.test(finalPass);
            var lowercaseCriteria = /[a-z]/.test(finalPass);
            var numberCriteria = /[0-9]/.test(finalPass);
            var specialCharCriteria = /[!@#$%^&*(),.?":{}|<>]/.test(finalPass);

            var error = [];

           
            if(lengthCriteria)
            {
                document.getElementById('passErr1').classList.remove('text-danger');
                document.getElementById('passErr1').classList.add('text-success');
                passOK = true;

            }else{
                document.getElementById('passErr1').classList.remove('text-success');
                document.getElementById('passErr1').classList.add('text-danger');
                passOK = false;
            }

            if(uppercaseCriteria)
            {
                document.getElementById('passErr2').classList.remove('text-danger');
                document.getElementById('passErr2').classList.add('text-success');
                passOK = true;

            }else{
                document.getElementById('passErr2').classList.remove('text-success');
                document.getElementById('passErr2').classList.add('text-danger');
                passOK = false;
            }

            if(lowercaseCriteria)
            {
                document.getElementById('passErr3').classList.remove('text-danger');
                document.getElementById('passErr3').classList.add('text-success');
                passOK = true;

            }else{
                document.getElementById('passErr3').classList.remove('text-success');
                document.getElementById('passErr3').classList.add('text-danger');
                passOK = false;
            }

            if(specialCharCriteria)
            {
                document.getElementById('passErr4').classList.remove('text-danger');
                document.getElementById('passErr4').classList.add('text-success');
                passOK = true;

            }else{
                document.getElementById('passErr4').classList.remove('text-success');
                document.getElementById('passErr4').classList.add('text-danger');
                passOK = false;
            }

            if(finalPass.length > 0 && !passOK)
            {
                messageElem.style.display = 'block';
            }else{
                messageElem.style.display = 'none';
            }

           
        }

        function passMatch()
        {
            var passArr = [];
            var rePassArr = [];
            var passElements = document.getElementsByName('pass');
            var rePassElements = document.getElementsByName('rePass');
            var messageElem = document.getElementById("rePassMsg");

            var childs = messageElem.children;

            for (var i = 0; i < passElements.length; i++) {
                passArr.push(passElements[i].value);
            }
            var finalPass = passArr.join();


            for (var i = 0; i < rePassElements.length; i++) {
                rePassArr.push(rePassElements[i].value);
            }

            var finalRePass = rePassArr.join();

            if(finalPass === finalRePass && finalPass.length > 0)
            {
                childs[1].style.display = 'none';
                childs[0].style.display = 'block';
            }else
            {
                childs[1].style.display = 'block';
                childs[0].style.display = 'none';
            }

            if(finalRePass.length > 0)
            {
                messageElem.style.display = 'block';
            }else{
                messageElem.style.display = 'none';
            }

            
        }

        


        
    </script>

</body>

</html>