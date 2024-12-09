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
                <th scope="row"><?= $i + 1 ?></th>
                <td><img src="<?= $item[0]['fileLoc'] ?>" width="50px" alt=""></td>
                <td><?= $item[0]['name'] ?></td>
                <td>Php <?= $item[0]['price'] ?></td>
                <input type="hidden" class="pprice" value="<?= $item[0]['price'] ?>">

                <?php

                if($item[0]['quantity'] <= 0){
                ?>
                    <td colspan="2" class="text-center">
                        <input type="hidden" class="form-control itemQ" value="noStuck" style="width: 75px;">
                        <strong>Out of Stock</strong>
                    </td>
                    


                <?php }else{ ?>

                    <td><input type="number" class="form-control itemQ" value="<?= $row[$i]['itemQnty'] ?>" style="width: 75px;" disabled></td>
                    <td>Php <?= $row[$i]['itemPrice'] ?></td>
                    

                    

                
                <?php  $grandTotal += $row[$i]['itemPrice']; } ?>

            </tr>


<?php
        
    }
    }
}

?>