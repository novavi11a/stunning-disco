<?php

session_start();

include "../init/connect.php";
include "../init/functions.php";

require "../controllers/checkout-controller.php";

if (isset($_SESSION['username'])) {
    $query = 'SELECT * FROM users WHERE username = :username';
    $rowUser = query($query, ['username' => $_SESSION['username']]);


    if (empty($rowUser)) {
        echo "ERROR FETCHING DATA!!";
        die;
    }
}

?>

<!doctype html>
<html lang="en" data-bs-theme="light">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Cakeasy Bakeshop | Checkout</title>


    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="../assets/css/nav.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/carousel.css">



</head>

<body class="align-items-center py-4 bg-body-tertiary">

    <main>



        <div class="container marketing">

            <h1 class="text-center">Checkout</h1>


            <div class="row mb-5">

                <div id="message"></div>



            </div>

            <div class="row m-5 p-5">

                <table class="table border border-5 rounded-3">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Image</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total Price</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php include 'partials/checkoutTable.php'; ?>
                        <td colspan="3" class="text-center">
                            <a href="userCart.php" class="btn btn-warning">&nbsp;&nbsp;&nbsp;Back to Cart</a>
                        </td>
                        <td colspan="2" class="text-center">
                            <b>&nbsp;&nbsp;&nbsp;Grand Total: </b>
                        </td>
                        <td>Php <?= $grandTotal ?></td>
                        </tr>
                    </tbody>
                </table>


                <div class="row g-3 text-center">



                <form method="post" >
    <div class="form-group">
        <input type="text" name="fname" class="form-control mb-2 <?php
                    if(!empty($errors['fName']))
                    {
                        echo $errors['fName'];
                    }else { echo ""; }
                ?>" value="<?= $rowUser[0]['firstname'] ?>" placeholder="Enter First Name" required>
    </div>
    <div class="form-group">
        <input type="text" name="lname" class="form-control mb-2 <?php
                    if(!empty($errors['lname']))
                    {
                        echo $errors['lname'];
                    }else { echo ""; }
                ?>" value="<?= $rowUser[0]['lastname'] ?>" placeholder="Enter Last Name" required>
    </div>
    <div class="form-group">
        <input type="email" name="email" class="form-control mb-2 <?php
                    if(!empty($errors['email']))
                    {
                        echo $errors['email'];
                    }else { echo ""; }
                ?>" value="<?= $rowUser[0]['email'] ?>" placeholder="Enter E-Mail" required>
    </div>
    <div class="form-group">
        <textarea name="address" class="form-control mb-2 <?php
                    if(!empty($errors['address']))
                    {
                        echo $errors['address'];
                    }else { echo ""; }
                ?>" rows="3" cols="10" placeholder="Enter Delivery Address Here..."></textarea>
    </div>
    <h6 class="text-center lead">Select Payment Mode</h6>
    <div class="form-group">
        <select id="pmode" name="pmode" class="form-control mb-2" required>
            <option value="" selected disabled>-Select Payment Mode-</option>
            <option value="cod">Cash On Delivery</option>
            <option value="netbanking">E-Wallet</option>
            <option value="cards">Debit/Credit Card</option>
        </select>
    </div>

    <div id="eWallet" style="display:none;text-align:left">
        <h4 class="mb-3 mt-5">Payment</h4>
        <div class="my-3">
            <div class="form-check">
                <input id="gcash" name="paymentMethod" type="radio" class="form-check-input" value="gcash">
                <label class="form-check-label" for="gcash">GCASH</label>
            </div>
            <div class="form-check">
                <input id="maya" name="paymentMethod" type="radio" class="form-check-input" value="maya" >
                <label class="form-check-label" for="maya">MAYA</label>
            </div>
        </div>
        <div class="row gy-3">
            <div class="col-md-6">
                <label for="cc-name" class="form-label">Name</label>
                <input type="text" class="form-control" id="cc-name" name="eWalletAccName" placeholder="" >
                <small class="text-body-secondary">Full name as displayed on card</small>
                <div class="invalid-feedback">
                    Name on card is required
                </div>
            </div>
            <div class="col-md-6">
                <label for="cc-number" class="form-label">Account Number</label>
                <input type="text" class="form-control" id="cc-number" name="eWalletAccNum" placeholder="" >
                <div class="invalid-feedback">
                    Account number is required
                </div>
            </div>
        </div>
    </div>

    <div id="bank" style="display:none; text-align:left">
        <h4 class="mb-3 mt-5">Payment</h4>
        <div class="my-3">
            <div class="form-check">
                <input id="credit" name="paymentMethod" type="radio" class="form-check-input" value="credit" >
                <label class="form-check-label" for="credit">Credit card</label>
            </div>
            <div class="form-check">
                <input id="debit" name="paymentMethod" type="radio" class="form-check-input" value="debit" >
                <label class="form-check-label" for="debit">Debit card</label>
            </div>
            <div class="form-check">
                <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" value="paypal" >
                <label class="form-check-label" for="paypal">PayPal</label>
            </div>
        </div>
        <div class="row gy-3">
            <div class="col-md-6">
                <label for="cc-name" class="form-label">Name on card</label>
                <input type="text" class="form-control" id="cc-name" name="cc-name" placeholder="" >
                <small class="text-body-secondary">Full name as displayed on card</small>
                <div class="invalid-feedback">
                    Name on card is required
                </div>
            </div>
            <div class="col-md-6">
                <label for="cc-number" class="form-label">Credit card number</label>
                <input type="text" class="form-control" id="cc-number" name="cc-number" placeholder="" >
                <div class="invalid-feedback">
                    Credit card number is required
                </div>
            </div>
            <div class="col-md-3">
                <label for="cc-expiration" class="form-label">Expiration</label>
                <input type="text" class="form-control" id="cc-expiration" name="cc-expiration" placeholder="" >
                <div class="invalid-feedback">
                    Expiration date required
                </div>
            </div>
            <div class="col-md-3">
                <label for="cc-cvv" class="form-label">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" name="cc-cvv" placeholder="" >
                <div class="invalid-feedback">
                    Security code required
                </div>
            </div>
        </div>
    </div>

    <button class="btn btn-primary w-100 py-2" type="submit" name="submit">Place Order</button>
</form>


            </div><!-- /.row -->

            <!-- START THE FEATURETTES -->




            <hr class="featurette-divider">

            <!-- /END THE FEATURETTES -->

        </div><!-- /.container -->





        <!-- FOOTER -->
        <footer class="container">
            <p class="float-end"><a href="#">Back to top</a></p>
            <p>&copy; 2017–2024 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
        </footer>




    </main>






    <script src="../assets/js/jquery-3.7.1.min.js"></script>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>





    <script>
        document.getElementById('pmode').addEventListener('change', function() {

            var selectedValue = this.value;
            var myDiv = document.getElementById('eWallet');
            var myDiv2 = document.getElementById('bank');

            if (selectedValue == 'netbanking') {
                myDiv.style.display = 'block';
                myDiv2.style.display = 'none';
            } else if (selectedValue == 'cards') {
                myDiv.style.display = 'none';
                myDiv2.style.display = 'block';
            } else {
                myDiv.style.display = 'none';
                myDiv2.style.display = 'none';
            }

        });

        load_cart_item_number();

        function load_cart_item_number() {
            $.ajax({
                url: '../controllers/home-controller.php',
                method: 'GET',
                data: {
                    cartItem: 'cartItem'
                },

                success: function(response) {

                }

            });
        }
    </script>

</body>

</html>