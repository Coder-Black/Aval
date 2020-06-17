<?php

/**
* Products Class API
* Dapo Believe
*/
class Products 
{
    
    // function __construct(argument)
    // {
    //     # code...
    // }

    public function getProducts($con)
    {   
        $output = array();
        $sql = "SELECT products.*, mans.name AS manu
                FROM products
                LEFT JOIN mans
                ON products.man_id = mans.id
                ORDER BY products.id
                LIMIT 20";
        $query = mysqli_query($con, $sql);

        while ($data = mysqli_fetch_object($query)) {
            $cat = mt_rand(1, 9);
            $output[] = array(
                'id'           => $data->id,
                'img'          => $cat,
                'productName'  => $data->name,
                'productPrice' => $data->price,
                'company'      => $data->manu,
            );
        }

        $response = array(
            'status'  => 1,
            'records' => $output,
            'message' => 'GOOD'
        );
        return json_encode($response);
    }

    public function getTrans($con, $id)
    {
        $output = array();
        $sql = "SELECT * 
                FROM `orders`
                WHERE user_id = $id
                ";
        $query = mysqli_query($con, $sql)or die(mysqli_error($con));

        $x = 1;
        while ($data = mysqli_fetch_object($query)) {
            if($data->deliver)
                $deliver = $data->deliver;
            else
                $deliver = 'Not Set';
            $output[] = array(
                'id'      => $x,
                'orderId' => $data->id,
                'price'   => number_format($data->price),
                'paid'    => $data->paid,
                'ref'     => $data->ref,
                'status'  => $data->status,
                'deliver' => $deliver,
                'date'    => $data->date,
            );
            $x++;
        }

        $response = array(
            'status'  => 1,
            'records' => $output,
            'message' => 'GOOD'
        );
        return json_encode($response);
    }
}

?>