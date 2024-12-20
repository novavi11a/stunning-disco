<?php

session_start();

include "../../init/connect.php";
include "../../init/functions.php";

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
  if($_GET['url'] == 'addUser' || $_GET['url'] == 'archive' || $_GET['url'] == 'restore')
  {
    require "../controllers/users-controller.php";
    
  }else if($_GET['url'] == 'editUser')
  {
    require "../controllers/users-edit-controller.php";
  }
}

?>


<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.122.0">
  <title>Cakeasy Bakeshop Admin | Accounts</title>

  <link href="../../assets/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="../../assets/css/admin.style.css">
  <link rel="stylesheet" href="../../assets/css/dashboard.css">
  <link rel="stylesheet" href="../../assets/css/popup.css">


</head>

<body>



  <?php include '../views/partials/icons.php'; ?>

  <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">Cakeasy Bakeshop</a>

    <ul class="navbar-nav flex-row d-md-none">
      <li class="nav-item text-nowrap">
        <button class="nav-link px-3 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false" aria-label="Toggle search">
          <svg class="bi">
            <use xlink:href="#search" />
          </svg>
        </button>
      </li>
      <li class="nav-item text-nowrap">
        <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <svg class="bi">
            <use xlink:href="#list" />
          </svg>
        </button>
      </li>
    </ul>

    <div id="navbarSearch" class="navbar-search w-100 collapse">
      <input class="form-control w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
    </div>
  </header>

  <div class="container-fluid">
    <div class="row">
      <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
        <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" aria-current="page" href="dashboard.php">
                  <svg class="bi">
                    <use xlink:href="#house-fill" />
                  </svg>
                  Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="orders.php">
                  <svg class="bi">
                    <use xlink:href="#file-earmark" />
                  </svg>
                  Orders
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="inventory.php">
                  <svg class="bi">
                    <use xlink:href="#cart" />
                  </svg>
                  Inventory
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 active" href="#">
                  <svg class="bi">
                    <use xlink:href="#people" />
                  </svg>
                  Customers
                </a>
              </li>


              <hr class="my-3">

              <ul class="nav flex-column mb-auto">
                
                <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="../../init/destroy.php?url=admin">
                <svg class="bi"><use xlink:href="#door-closed"/></svg>
                Sign out
              </a>
              </ul>
          </div>
        </div>
      </div>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Customers</h1>

          <div class="btn-toolbar mb-2 mb-md-0" style='display:
              <?php

                if(isset($_GET['url']))
                {
                  
                    echo 'none';
                  
                }else
                {
                  echo 'block';
                }

              ?>'>
              
              <a href="users.php?url=addUser" class="btn btn-sm btn-primary d-flex align-items-center gap-1">Add new User</a>
            </div>
          
           
        </div>

      <?php

      if (isset($_GET['url'])) {
        if ($_GET['url'] == 'addUser') {
     
         include 'partials/add-users.php';

        }

        if($_GET['url'] == 'editUser')
        {
          include 'partials/edit-users.php';
        }

      } else {

        ?>

        <table class="table border border-5 rounded-3">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Username</th>
              <th scope="col">E-mail</th>
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Action</th>
            </tr>
          </thead>

          <tbody>

          <?php
            include '../views/partials/user-partial.php'
          ?>
          </tbody>

        </table>

      <?php

      }



      ?>





      

      <script src="../../assets/dist/js/bootstrap.bundle.min.js"></script>
      <script src="../../assets/js/dashboard.js"></script>

      <script src="../../assets/js/jquery-3.7.1.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>

      <script>
        function changePass(){

          let old = '<?=$row[0]['password']?>';

          let pField = $('div[class="pWordInput"]');
          let pass = $('input[name="pass"]');
          let rePass = $('input[name="rePass"]');
          let isChange = $('input[name="isPasswordChange"]');

          let trig = $('p[id="changeToggler"]');

          if(trig.text() === 'Reset Password')
        {
          pass.val('');
          rePass.val('');
          isChange.val('true');
          trig.text('Cancel')

          pField.css({'display' : 'block'});
        }
        else
        {
          pass.val(old);
          rePass.val(old);
          isChange.val('false');
          trig.text('Reset Password')

          pField.css({'display' : 'none'});
        }

          

        }
      </script>


</body>

</html>