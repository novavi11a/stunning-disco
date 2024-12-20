<?php

$grandTotal = 0;

if (isset($_SESSION['username'])) {
    $query = 'SELECT * FROM cart WHERE  orderCode = :orderCode';
    $row = query($query,['orderCode' => $_SESSION['username']]);

    if (!empty($row)) {

        for ($i = 0; $i < count($row); $i++) {
            
            $query = 'SELECT * FROM items WHERE id = :id limit 1';
            $item = query($query, ['id' => $row[$i]['itemID']]);

?>

            <tr>
                <input type="hidden" class="pid" value="<?= $row[$i]['id'] ?>">
                <input type="hidden" class="maxQ" value="<?= $item[0]['quantity'] ?>">
                <th scope="row"><?= $i + 1 ?></th>
                <td><img src="<?= $item[0]['fileLoc'] ?>" width="50px" alt=""></td>
                <td><?= $item[0]['name'] ?></td>
                <td>Php <?= $item[0]['price'] ?></td>
                <input type="hidden" class="pprice" value="<?= $item[0]['price'] ?>">
                <td><?= $item[0]['quantity'] ?></td>

                <?php
                if($item[0]['quantity'] <= 0){
                ?>
                    <td colspan="2" class="text-center">
                        <input type="hidden" class="form-control itemQ" value="0" style="width: 75px;">
                        <strong>Out of Stock</strong>
                    </td>
                    <td><a href="../../controllers/cart-controller.php?remove=<?=$row[$i]['id']?>"
                        onclick="return confirm('Are you sure you want to REMOVE this Item?')" class="text-danger">Remove</a>
                    </td>


                <?php }else{ ?>

                    <td><input type="number" class="form-control itemQ" value="<?= $row[$i]['itemQnty'] ?>" style="width: 75px;" min="1"></td>
                    <td>Php <?= $row[$i]['itemPrice'] ?></td>
                    <td><a href="../../controllers/cart-controller.php?remove=<?=$row[$i]['id']?>"
                        onclick="return confirm('Are you sure you want to REMOVE this Item?')" class="text-danger">Remove</a>
                    </td>

                    
                    
                
                <?php  $grandTotal += $row[$i]['itemPrice'];} ?>

            </tr>


<?php
        
    }
    }
}

?>