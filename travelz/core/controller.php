<?php session_start();?>
<?php
/**
* Controls all logic of the app
* Dapo Believe
* 
*/
require_once "conn.php";
require_once "hash.php";

if(isset($_GET['sach'])){
    $da = array();
    $from = ucfirst(strtolower($_GET['from']));
    $to = ucfirst(strtolower($_GET['to']));
    $dat = $_GET['date'];

    $sql = "SELECT flights.* , airline.name as airline
            FROM flights
            JOIN airline ON flights.aid = airline.id
            WHERE `from` = '$from' 
            AND `to` = '$to' 
            ORDER BY MONTH(`ddate`)";
    $query = mysqli_query($con, $sql);

    if(mysqli_num_rows($query) > 0){
        while($data = mysqli_fetch_object($query)){
            $da[] = array(
                'id'      => $data->id,
                'airline' => $data->airline,
                'from' => $data->from,
                'to' => $data->to,
                'date' => $data->ddate,
                'fcode' => $data->fcode,
                'price' => $data->price
            );
        }

        $res = array(
            'status' => 1,
            'datas' => $da,
            'msg'   => 'Data Found'
        );

    }else{
        $res = array(
            'status' => 0,
            'datas' => null,
            'msg'   => 'No Flight Records exists at the moment please try again later'
        );
    }

    echo json_encode($res);
}
function storeDetails($con, $id)
{
    $userId = $_SESSION['userData']['id'];

    $hash = $_SESSION['hash'] = Hasher::getHashedToken();
   
    mysqli_query($con, "INSERT INTO bookings (`user_id`,`fid`,`trxncode`) 
                        VALUES ('$userId','$id','$hash')
                         ")or die(mysqli_error($con));

}

function hasBooked($con, $userId, $flightId)
{
    $sql = mysqli_query($con, "SELECT * FROM `bookings` 
                              WHERE `user_id` = '$userId' 
                              AND fid = '$flightId'
                              AND pstatus = 'Paid'
                              ")or die(mysqli_error($con));

    if(mysqli_num_rows($sql) > 0){
        return true;
    }else{
        return false;
    }
}


if(isset($_GET['fId'])){
    $id = $_GET['fId'];

    $sql = mysqli_query($con,"DELETE FROM `flights` WHERE `id` = '$id' ")or die(mysqli_error($con));
    echo "Flight Record Deleted ";
}

?>