<?php

$id = $_GET['id'];

$query = 'SELECT * FROM users WHERE id = :id limit 1';
$row = query($query, ['id' => $id]);


?>



<form method="post">
    
    <h1 class="h3 mb-3 fw-normal">Edit User Account</h1>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">Please Fill in all Fields</div>
    <?php endif; ?>

    <input type="hidden" name="id" value="<?= $row[0]['id'] ?>">

    <div class="form-floating">
        <input type="text" value="<?= $row[0]['username'] ?>" name="username" class="form-control
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
        <input type="email" value="<?= $row[0]['email'] ?>" name="email" class="form-control
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
        <input type="text" value="<?= $row[0]['firstname'] ?>" name="fName" class="form-control <?php
                                                                                                if (!empty($errors['fName'])) {
                                                                                                    echo $errors['fName'];
                                                                                                } else {
                                                                                                    echo "";
                                                                                                }
                                                                                                ?>" id="floatingInput" placeholder="First Name">
        <label for="floatingInput">First Name</label>
    </div>

    <div class="form-floating">
        <input type="text" value="<?= $row[0]['lastname'] ?>" name="lName" class="form-control
                <?php
                if (!empty($errors['lName'])) {
                    echo $errors['lName'];
                } else {
                    echo "";
                }
                ?>" id="floatingInput" placeholder="Last Name">
        <label for="floatingInput">Last Name</label>
    </div>

    <div class="btn-toolbar mb-2 mb-md-0 ">
        <p id="changeToggler" onclick="changePass()" class="btn btn-sm btn-primary d-flex align-items-center gap-1">Reset Password</p>
    </div>

    <div class="pWordInput" style="display:none">
        <div class="form-floating">
            <input type="password" value="<?=$row[0]['password']?>" name="pass" class="form-control
                <?php
                if (!empty($errors['pass'])) {
                    echo $errors['pass'];
                } else {
                    echo "";
                }
                ?>" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>

        <input type="hidden" name="isPasswordChange" value="false">

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
                ?>" id="floatingPassword" placeholder="Repeat Password" value="<?= $row[0]['password'] ?>">
            <label for="floatingPassword">Repeat Password</label>
        </div>
    </div>


    <div class="form-floating">
    <button class="btn btn-primary w-10 py-2 col-md-3 editUsers" name='submit' type="submit">Edit</button>
    <a href="../views/users.php" class="btn btn-secondary w-10 py-2 col-md-3" type="submit">Back</a>
    </div>

</form>
