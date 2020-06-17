<?php require_once "core/controller.php";?>
<?php 
	$id = $_GET['id'];
	$query = mysqli_query($con, "DELETE FROM bookings WHERE id='$id'");

	if($query) {
		echo "<script>alert('Flight Cancelled Successfully')</script>";
		echo "<script>window.location = 'booking.php';</script>";
	} else {
		echo "<script>alert('Flight Could Not be Cancelled! Try Again')</script>";
		echo "<script>window.location = 'booking.php';</script>";
	}
 ?>