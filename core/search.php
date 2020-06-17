<?php
require_once "conn.php";  
    $da = array();
    $from = ucfirst(strtolower($_GET['from']));
    $to = ucfirst(strtolower($_GET['to']));

    $sql = "SELECT flights.* , airline.name as airline
            FROM flights
            JOIN airline ON flights.aid = airline.id
            WHERE `from` = '$from'
            AND `to` = '$to'";

    $query = mysqli_query($con, $sql);

    if(mysqli_num_rows($query) > 0) {
        while($data = mysqli_fetch_object($query)) {
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

    } else {
        $res = array(
            'status' => 0,
            'datas' => null,
            'msg'   => 'No Flight Records exists at the moment please try again later'
        );
    }

    echo json_encode($res);
?>