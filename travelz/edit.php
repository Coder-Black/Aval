<?php require_once "core/controller.php";?>
<?php
if(!isset($_SESSION['adminData'])){
    header('Location: logout.php');
}

$sql = mysqli_query($con, "SELECT * FROM airline");

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
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
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
                            <a href="index.php"><img src="images/logo.png" alt="" />
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
        <div class="db-2">
            <div class="db-2-com db-2-main">
                <h4>Edit My Profile </h4>
                <div class="db-2-main-com db2-form-pay db2-form-com">
                    <form class="col s12">
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input type="text" class="validate">
                                <label>From</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input type="text" class="validate">
                                <label>To</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <select>
                                    <option value="" disabled selected>Select Airline</option>
                                    <?php while($data = mysqli_fetch_object($sql)) {?>
                                        <option value="<?php echo $data->id?>"><?php echo $data->name?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                         <div class="row">
                            <div class=" col s12">
                                <input type="text" class="validate">
                                <label>Flight Code</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col s12">
                                <input type="time" class="validate">
                                <label>Flight Time</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col s12">
                                <input type="date" class="validate">
                                <label>Flight Date</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col s12">
                                <input type="number" class="validate">
                                <label>Price</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="submit" value="SUBMIT" class="waves-effect waves-light full-btn"> </div>
                        </div>
                    </form>
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