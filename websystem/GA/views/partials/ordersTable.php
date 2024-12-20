<?php

$grandTotal = 0;

if (isset($_SESSION['username'])) {
    $query = 'SELECT * FROM orders WHERE  user = :user';
    $row = query($query,['user' => $_SESSION['username']]);

    if (!empty($row)) {

        for ($i = 0; $i < count($row); $i++) {
            
            

?>

            <tr>


                <th scope="row"><?= $i + 1 ?></th>
                <td><?=$row[$i]['details']?></td>
                <td><?=$row[$i]['amount']?></td>
                <td><?=$row[$i]['timestamp']?></td>
                <td><?=$row[$i]['transacID']?></td>
                <td><?=$row[$i]['status']?></td>


                <?php
                    if($row[$i]['status'] == 'Pending')
                    { ?>
                        <form method="post">
                        <input type="hidden" name="transacID" value="<?=$row[$i]['transacID']?>">
                        <td><button type="submit"  class="btn btn-warning" name="submit" value="cancel">Cancel Order</button></td>
                        </form>
                        
                    
                    <?php
                        
                    }
                    else
                    {
                        echo '<td><a href="" class="btn btn-secondary">Cancel Order</a></td>';
                    }
                ?>
                
               
                    
                    
                
                <?php } ?>

            </tr>


<?php
        
    }
    }


?>