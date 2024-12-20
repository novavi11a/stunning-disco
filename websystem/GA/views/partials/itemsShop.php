<?php




    $query = 'SELECT * FROM items WHERE status = "Active"';
    $row = query_row($query);



?>




<?php

if ($row) {

    for ($i = 0; $i < count($row); $i++) {
?>


        <div class="col-lg-4 border border-dark rounded bg-light bg-opacity-50 p-3">

            <img class="bd-placeholder-img rounded-circle shadow p-3 mb-5 bg-white rounded" src="<?= $row[$i]['fileLoc'] ?>" alt="itemImg" width="140" height="140" />

            <h2 class="fw-normal"><?= $row[$i]['name'] ?></h2>
            <p><?= $row[$i]['description'] ?></p>
            <p>In Stock:<?= $row[$i]['quantity'] ?></p>
            <p>
            <h5>Price: Php <?= $row[$i]['price'] ?></h5>
            </p>

            <form class="form-submit">
                <input type="hidden" class="itemID" value="<?= $row[$i]['id'] ?>">
                <input type="hidden" class="itemName" value="<?= $row[$i]['name'] ?>">

                <?php
                if (isset($_SESSION['username'])) {
                ?>

                    <button class="btn btn-secondary btn-block addItemBtn">
                        <i class="fa fa-cart-plus"></i>Add to Cart
                    </button>

                <?php
                } else {
                ?>
                    <button class="btn btn-secondary btn-block login">
                        <i class="fa fa-cart-plus"></i>Add to Cart
                    </button>
                <?php
                }
                ?>

            </form>



        </div><!-- /.col-lg-4 -->




        <?php
    }

    




     
}





?>