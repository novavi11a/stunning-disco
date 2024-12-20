<form method="post">

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



<div class="form-floating">
    <button class="btn btn-primary w-10 py-2 col-md-3" name='submit' type="submit">Save</button>
    <a href="../views/users.php" class="btn btn-secondary w-10 py-2 col-md-3" type="submit">Back</a>
</div>


<p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2024</p>
</form>