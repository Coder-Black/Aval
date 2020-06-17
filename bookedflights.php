<?php require_once "core/controller.php";?>
<?php
if(! isset($_SESSION['adminData'])) {
    header('Location: logout.php');
}
$sql =  "SELECT f.id as tfid, u.fname, u.lname, a.name as aname, f.from, f.to, fcode, price, ddate  FROM bookings b
       JOIN flights f
       ON b.fid=f.id
       JOIN airline a 
       ON f.aid = a.id
       JOIN users u
       ON u.id=b.user_id
       ";
$query = mysqli_query($con, $sql);

if(! $query or empty($query)) {
    die(mysqli_error($con));
} 

?>
<!DOCTYPE html>
<html lang="en">

<?php include "inc_head.php";?>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>

    <!-- MOBILE MENU -->

    <?php include "inc_mobilemenu.php";?>

    <!--HEADER SECTION-->
    <span id="dapp">
    <section>
        <!-- TOP BAR -->
        <div class="ed-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ed-com-t1-left">
                            <ul>
                            </ul>
                        </div>
                        <div class="ed-com-t1-right">
                            <ul>
                                <li><a href="login.php">Sign In</a>
                                </li>
                                <li><a href="register.php">Sign Up</a>
                                </li>
                            </ul>
                        </div>
                        <div class="ed-com-t1-social">
                            <ul>
                                <li><a href="facebook.com"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                </li>
                                <li><a href="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                </li>
                                <li><a href="twitter.com"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- LOGO AND MENU SECTION -->
        <div class="top-logo" data-spy="affix" data-offset-top="250">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wed-logo">
                            <a href="admin-home.php"><img src="images/logo.png" alt="" />
                            </a>
                        </div>
                        <div class="main-menu">
                            <?php include "inc_nav.php";?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--END HEADER SECTION-->

    <!--HEADER SECTION-->
    <section>
    <div class="db">
        <!--LEFT SECTION-->
        <?php include "admin-side.php";?>
        <!--CENTER SECTION-->
        <div>
            <div class="db-2-com db-2-main">
                <h4>Booked Flights </h4>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Flight ID</th>
                                <th>User Name</th>
                                <th>Airline</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Flight Code</th>
                                <th>Price</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($data = mysqli_fetch_assoc($query)): ?>
                            <tr>
                                <td><?php echo $data['tfid'] ?></td>
                                <td><?php echo $data['fname'] . " " . $data['lname']?></td>
                                <td><?php echo $data['aname'] ?></td>
                                <td><?php echo $data['from'] ?></td>
                                <td><?php echo $data['to'] ?></td>
                                <td><?php echo $data['fcode'] ?></td>
                                <td><?php echo $data['price'] ?></td>
                                <td><?php echo $data['ddate'] ?></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--RIGHT SECTION-->
    </div>
</section>

    </span>
    <?php include "inc_footer.php";?>
    <!--========= Scripts ===========-->
    <?php include "inc_scripts.php";?>

</body>

</html>
