<?php require_once "core/controller.php";?>
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
                                <li><a href="login.html">Sign In</a>
                                </li>
                                <li><a href="register.html">Sign Up</a>
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
                            <a href="main.html"><img src="images/logo.png" alt="" />
                            </a>
                        </div>
                        <div class="main-menu">
                            <ul>
                                <li><a href="index.php">Home</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END TOP SEARCH BOX -->
    </section>
    <!--END HEADER SECTION-->
    
    <!--HEADER SECTION-->
    <section>
        <div class="tr-register">
            <div class="tr-regi-form">
                <h4>Create an Account</h4>
                <p>It's free and always will be.</p>
                <form action="core/register.php" method="post" class="col s12">
                    <div class="row">
                        <div class="input-field col m6 s12">
                            <input type="text"  name="fname" class="validate">
                            <label>First Name</label>
                        </div>
                        <div class="input-field col m6 s12">
                            <input type="text"  name="lname" class="validate">
                            <label>Last Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="number"  name="phone" class="validate">
                            <label>Mobile</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="email"  name="email" class="validate">
                            <label>Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="password"  name="password1" class="validate">
                            <label>Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="password"  name="password2" class="validate">
                            <label>Confirm Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text"  name="address" class="validate">
                            <label>Address</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="submit" value="submit" class="waves-effect waves-light btn-large full-btn"> </div>
                    </div>
                </form>
                <p>Are you a already member ? <a href="login.php">Click to Login</a>
                </p>
            </div>
        </div>
    </section>


    <?php include "inc_footer.php";?>
    <!--========= Scripts ===========-->
    <script src="js/jquery-latest.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>