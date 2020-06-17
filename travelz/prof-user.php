<section>
        <div class="db">
            <!--LEFT SECTION-->
            <?php include "inc_left.php";?>
            <!--CENTER SECTION-->
            <div class="db-2">
                <div class="db-2-com db-2-main">
                    <h4>My Profile</h4>
                    <div class="db-2-main-com db-2-main-com-table">
                        <table class="responsive-table">
                            <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td>:</td>
                                    <td><?php echo $_SESSION['userData']['fname']?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td><?php echo $_SESSION['userData']['email']?></td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>:</td>
                                    <td><?php echo $_SESSION['userData']['phone']?></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>:</td>
                                    <td><span class="db-done">Active</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="db-mak-pay-bot">
                            
                        </div>
                    </div>
                </div>
            </div>
            <!--RIGHT SECTION-->
        </div>
    </section>