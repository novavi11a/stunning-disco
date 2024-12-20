<?php
    
    if($_SERVER['REQUEST_METHOD'] = 'POST')
    {
        if(isset($_POST['submit']))
        {
            $errors = [];
            $data = [];

            $username = $_POST['username'];
            $password = $_POST['pass'];

            $query = "SELECT * FROM users WHERE username = :username limit 1";
            $row = query($query,['username'=>$username]);

            

            if(empty($username))
            {
                $errors['username'] = "border border-danger";
            }else
            {
                if(empty($row))
                {
                    $errors['username'] = "border border-danger";
                }
                else
                {
                    if(empty($password))
                    {
                        $errors['pass'] = "border border-danger";
                    }else
                    {
                        
                        if(!password_verify($password, $row[0]['password']))
                        {
                            $errors['pass'] = "border border-danger";
                        }
                        else
                        {

                            session_start();
                            $_SESSION['username'] = $row[0]['username'];
                            $_SESSION['role'] = $row[0]['role'];
                            
                            header('location: ../views/dashboard.php');
                        }

                        
                    }
                }
            }

            

            
        }
    }