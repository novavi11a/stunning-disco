<?php


    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        
        if(isset($_POST['submit']))
        {
            $errors = [];
            $data = [];

            $username = $_POST['username'];
            $email = $_POST['email'];
            $fName = $_POST['fName'];
            $lName = $_POST['lName'];
            $password = $_POST['pass'];

            

            if(empty($username))
            {
                $errors['username'] = "border border-danger";
            }else{

                $query = "SELECT * FROM users WHERE username = :username limit 1";
                $row = query($query,['username'=>$username]);

                //print_r($row);

            }

            if(empty($email))
            {
                $errors['email'] = "border border-danger";
            }

            if(empty($fName))
            {
                $errors['fName'] = "border border-danger";
            }

            if(empty($lName))
            {
                $errors['lName'] = "border border-danger";
            }

            if(empty($password))
            {
                $errors['pass'] = "border border-danger";
            }
            else
            {
                if (strlen($password) < 8)  $errors['pass'] = "border border-danger";;
                if (!preg_match('/[A-Z]/', $password))  $errors['pass'] = "border border-danger";;
                if (!preg_match('/[a-z]/', $password))  $errors['pass'] = "border border-danger";;
                if (!preg_match('/[0-9]/', $password))  $errors['pass'] = "border border-danger";;
                if (!preg_match('/[\W]/', $password))  $errors['pass'] = "border border-danger";;

                if($password != $_POST['rePass'])
                {
                    $errors['pass'] = "border border-warning";
                    $errors['rePass'] = "border border-danger";
                    $errors['unMatch'] = 'Password did not Match';
                }
            }

           

            if(empty($errors))
            {
                $newPass = password_hash($password,PASSWORD_BCRYPT);

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

                header("Location: ../views/login.php");

            
                
            }

       
        }
    }

    

?>