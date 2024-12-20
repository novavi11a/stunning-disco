<?php




if(isset($_POST['submit']))
{

    if(isset($_SESSION['username']))
    {

        $grandTotal = 0;
        $allItems = '';
        $items = [];

        $query = 'SELECT itemID, itemPrice, itemQnty FROM cart WHERE orderCode = :orderCode';
        $row = query($query, ['orderCode'=>$_SESSION['username']]);

        echo '<pre>';
        print_r($row);
        echo '</pre>';

        for ($i=0; $i < count($row); $i++) {

            $query = 'SELECT name, price, quantity FROM items where id = '.$row[$i]['itemID'].' limit 1';
            $itemName = query_row($query);

            if($itemName[0]['quantity'] > 0)
            {
                $detailConcat[$i] = '('.$itemName[0]['name'].'('.$itemName[0]['price'].') X '.$row[$i]['itemQnty'].' = '.$row[$i]['itemPrice'].')';

                $grandTotal += $row[$i]['itemPrice'];

                $newItemQ = $itemName[0]['quantity'] - $row[$i]['itemQnty'];

                $query = 'UPDATE items SET quantity = '.$newItemQ.',score = score + '.$row[$i]['itemQnty'].' where id = '.$row[$i]['itemID'].' limit 1';
                query_row($query);

                
            }
           
           
        }
        
        echo '<pre>';
        print_r($detailConcat);
        echo '</pre>';
 
        $allItems = implode(' <br> ',$detailConcat);
        echo $allItems;
        
        
    }
    
    $errors = [];
    $data_order = [];
    $data_transac = [];

    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $pmode = $_POST['pmode'];

    
    if($pmode == 'netbanking')
    {
        $payMethod = $_POST['paymentMethod'];
        $accName = $_POST['eWalletAccName'];
        $accNum = $_POST['eWalletAccNum'];

        $transacDetails = "Account Name: $accName | Account Number: $accNum";
        

    }else{
        if($pmode == 'cards')
        {
            $ccName = $_POST['cc-name'];
            $ccNum = $_POST['cc-number'];
            $ccExp = $_POST['cc-expiration'];
            $ccCVV = $_POST['cc-cvv'];

            $transacDetails = "Account Name: $ccName | Account Number: $ccNum | Card Exp: $ccExp | Card CCV: $ccCVV";
        }
        else
        {

            $transacDetails = 'CASH ON DELIVERY';

        }
    }

    $tCode = rand(0000,9999);
    $transacCode = 'Order#'.$tCode;

    $data_transac['transacID'] = $transacCode;
    $data_transac['payMethod'] = $pmode;
    $data_transac['details'] = $transacDetails;

    $data_order['details'] = $allItems;
    $data_order['user'] = $_SESSION['username'];
    $data_order['amount'] = $grandTotal;
    $data_order['address'] = $address;
    $data_order['transacID'] = $transacCode;
    $data_order['status'] = 'Pending';

    echo '<pre>';
    print_r($data_order);
    echo '</pre>';


    $query = 'INSERT INTO orders (details, user, amount, address, transacID, status) VALUES 
    (:details, :user, :amount, :address, :transacID, :status)';
    query($query,$data_order);

    $query = 'INSERT INTO transactions (transacID, payMethod, details) VALUES (:transacID, :payMethod, :details)';
    query($query,$data_transac);

    $query = 'DELETE FROM cart WHERE orderCode = :orderCode';
    query($query,['orderCode'=>$_SESSION['username']]);
    
    header('location: ../../../views/invoice.php?url='.$tCode.'');
    
}






