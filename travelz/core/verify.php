<?php 
require_once "controller.php";
require_once 'Paystack.php';
?>
<?php
$paystack = new Paystack('sk_test_5d66e20afb46d066a9f964f20cf6e64d5cd311b1');


$trx = $paystack->transaction->verify(
  [
   'reference'=>$_GET['ref']
  ]
);

// status should be true if there was a successful call. meaning the connection was successfully established with 
// their API; this is not success of the transaction 

if(!$trx->status){
  exit($trx->message);
}

// now this is the success of the transaction :)
if('success' == $trx->data->status) {
    // unset($_SESSION['cart']);
    unset($_SESSION['hash']);
    //update orders table
    $ref = $_GET['ref'];
    $sql = "UPDATE bookings 
            SET  `pstatus` = 'Paid',
                  `status` = 'booked'
            WHERE trxncode = '$ref' 
            ";
    mysqli_query($con,$sql)or die(mysqli_error($con));
    echo 1;
 
}
?>