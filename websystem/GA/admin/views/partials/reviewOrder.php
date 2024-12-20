<?php

$id = $_GET['id'];

$query = 'SELECT * FROM orders WHERE id = :id';
$orderRow = query($query, ['id' => $id]);

$query = 'SELECT * FROM transactions WHERE transacID = :transacID';
$transacRow = query($query, ['transacID' => $orderRow[0]['transacID']]);

$query = 'SELECT * FROM users WHERE username = :username';
$userRow = query($query, ['username' => $orderRow[0]['user']]);

?>



<div>

    <h1 class="text-end"><?= $orderRow[0]['transacID'] ?></h1>

    <p>Details: </p>
    <p><?= $orderRow[0]['details'] ?></p><br>
    <p><b>Amount:</b> <?= $orderRow[0]['amount'] ?></p>
    <p><b>Shipping Address: </b> <?= $orderRow[0]['address'] ?></p><br>

    <p><b>Account Name: </b> <?= $userRow[0]['firstname'] . " " . $userRow[0]['lastname'] ?></p>
    <p><b>Email: </b> <?= $userRow[0]['email'] ?></p>

    <form action="../controllers/orders-controller.php" method="post">
        <input type="hidden" name="orderCode" value="<?= $orderRow[0]['transacID'] ?>">

        <?php if ($orderRow[0]['status'] == 'Pending') { ?>

            <div class="form-floating">
                <button onclick="return confirm('Are you Sure You want to Ship this Order?');" class="btn btn-primary w-10 py-2 col-md-3 editUsers" name='submit' value="ship" type="submit">Ship Order</button>
                <button onclick="return confirm('Are you Sure You want to Cancel this Order?');" class="btn btn-warning w-10 py-2 col-md-3 editUsers" name='submit' value="cancel" type="submit">Cancel Order</button>
            </div>


            <?php
        } else {
            if ($orderRow[0]['status'] == 'Shipped') {
            ?>

                <h3 class="text-success">Shipped</h3>

            <?php
            }
            if ($orderRow[0]['status'] == 'Canceled') {
            ?>
                <h3 class="text-danger">Canceled</h3>
        <?php

            }
        }
        ?>

    </form>




</div>