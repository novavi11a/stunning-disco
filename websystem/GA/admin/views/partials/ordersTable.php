<?php


if(isset($_GET['page']))
{
    if($_GET['page'] == 'pending')
    {
        $query = 'SELECT * FROM orders WHERE status = "Pending"';
        $pending = 'active';
    }

    if($_GET['page'] == 'shipped')
    {
        $query = 'SELECT * FROM orders WHERE status = "Shipped"';
        $shipped = 'active';

    }

    if($_GET['page'] == 'canceled')
    {
        $query = 'SELECT * FROM orders WHERE status = "Canceled"';
        $canceled = 'active';
        $active = '';
    }
}else{
    $query = 'SELECT * FROM orders';
    $all = 'active';

}



$row = query_row($query);



?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?= $all ?>" aria-current="page" href="../views/orders.php">All</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $pending ?>" href="../views/orders.php?page=pending">Pending</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $shipped ?>" href="../views/orders.php?page=shipped">Shipped</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $calceled ?>" href="../views/orders.php?page=canceled">Canceled</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php


if (!empty($row)) {

    $badge = "";
    

    for ($i = 0; $i < count($row); $i++) {

        if($row[$i]['status'] == 'Pending')
        {
            $badge = "alert alert-warning text-warning";
        }

        if($row[$i]['status'] == 'Shipped')
        {
            $badge = "alert alert-success text-success";
        }

        if($row[$i]['status'] == 'Canceled')
        {
            $badge = "alert alert-secondary text-secondary";
        }

    ?>

        <tr>


            <th scope="row"><?= $i + 1 ?></th>
            <td><?= $row[$i]['transacID'] ?></td>
            <td><?= $row[$i]['details'] ?></td>
            <td><?= $row[$i]['user'] ?></td>
            <td><?= $row[$i]['amount'] ?></td>
            <td><?= $row[$i]['timestamp'] ?></td>
            <td><p class="<?=$badge?>"><?= $row[$i]['status'] ?></p></td>
            <td><a href="orders.php?url=review&id=<?= $row[$i]['id'] ?>" class="btn btn-info ">Review</a></td>




        <?php } ?>

        </tr>


    <?php

} else {
}



    ?>