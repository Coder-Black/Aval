<?php require_once "core/controller.php";?>
<?php  
$sql2 = mysqli_query($con, "SELECT a.name as aname, b.id as bid, f.fcode, f.from, f.to, f.id as fid, f.price, f.ddate, b.pstatus, b.status FROM bookings b 
                           JOIN flights f ON b.fid = f.id 
                           JOIN airline a ON a.id=f.aid
                           WHERE b.user_id = '7' ");

$row = mysqli_fetch_assoc($sql2);
var_dump($row);
?>