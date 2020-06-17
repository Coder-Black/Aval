<section>
        <div class="ed-mob-menu">
            <div class="ed-mob-menu-con">
                <div class="ed-mm-left">
                    <div class="wed-logo">
                        <a href=index.php"><img src="images/logo.png" alt="" />
                        </a>
                    </div>
                </div>
                <div class="ed-mm-right">
                    <div class="ed-mm-menu">
                        <a href="#!" class="ed-micon"><i class="fa fa-bars"></i></a>
                        <div class="ed-mm-inn">
                            <a href="#!" class="ed-mi-close"><i class="fa fa-times"></i></a>
                            <h4>Navigation</h4>
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li><a href="register.php">Sign Up</a></li>
                                <li><a href="login.php">Sign In</a></li>
                                <?php if(isset($_SESSION['userData'])) {?>
                                    <li><a href="userpage.php">Profile</a>
                                    </li>
                                <?php }?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>