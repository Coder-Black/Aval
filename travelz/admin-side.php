<div class="db-l">
                <div class="db-l-1">
                    <ul>
                        <li><img src="images/db-profile.jpg" alt="" />
                        </li>
                        <?php if(isset($_SESSION['userData'])) {?>
                        <li><span></span> <?php echo $_SESSION['userData']['email'] ?></li>
                        <li><span></span> <?php echo $_SESSION['userData']['fname'] ?></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="db-l-2">
                    <ul>
                        <?php if(isset($_SESSION['adminData'])) {?>
                            <li>
                                <a href="admin-home.php"><img src="images/icon/dbl6.png" alt="" /> Flights</a>
                            </li>
                            <li>
                                <a href="addflights.php"><img src="images/icon/dbl1.png" alt="" /> Add Flight</a>
                            </li>
                            <li>
                                <a href="logout.php"><img src="images/icon/dbl1.png" alt="" /> Logout</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
        </div>