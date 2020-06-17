<section>
        <div class="db">
            <!--LEFT SECTION-->
            <?php include "inc_left.php";?>
            <!--CENTER SECTION-->
            <div class="db-2">
                <div class="db-2-com db-2-main">
                    <h4>Event Details</h4>
                    <div class="db-2-main-com db-2-main-com-table">
                        <table class="responsive-table">
                            <tbody>
                                <tr>
                                    <td>Trip</td>
                                    <td>:</td>
                                    <td><?php echo $data->from ?> - <?php echo $data->to ?></td>
                                </tr>
                                <tr>
                                    <td>Airline</td>
                                    <td>:</td>
                                    <td><?php echo $data->airline ?></td>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <td>:</td>
                                    <td><?php echo $data->price ?></td>
                                </tr>
                                <tr>
                                    <td>Departure</td>
                                    <td>:</td>
                                    <td><?php echo $data->ddate ?></td>
                                </tr>
                                <tr>
                                    <td>Arrival</td>
                                    <td>:</td>
                                    <td><?php echo $data->adate ?></td>
                                </tr>
                                <tr>
                                    <td>Flight Code</td>
                                    <td>:</td>
                                    <td><?php echo $data->fcode ?></td>
                                </tr>

                                <tr>
                                    <td>Flight Capacity</td>
                                    <td>:</td>
                                    <td><?php echo $data->seats ?></td>
                                </tr>

                               <!--  <tr>
                                    <td>Duration</td>
                                    <td>:</td>
                                    <td>2Days</td>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <td>:</td>
                                    <td>$1280</td>
                                </tr>
                                <tr>
                                    <td>Start Date</td>
                                    <td>:</td>
                                    <td>21 May 2017</td>
                                </tr>
                                <tr>
                                    <td>End Date</td>
                                    <td>:</td>
                                    <td>03 Jun 2017</td>
                                </tr>
                                <tr>
                                    <td>Total Members</td>
                                    <td>:</td>
                                    <td>7(Adult:5, Children:2)</td>
                                </tr>
                                <tr>
                                    <td>Places Covered</td>
                                    <td>:</td>
                                    <td>Switzerland, Croatia, Austria, Bulgaria, Spain, Greece</td>
                                </tr>
                                <tr>
                                    <td>Payment Status</td>
                                    <td>:</td>
                                    <td><span class="db-not-done">Pending</span>
                                    </td>
                                </tr> -->
                            </tbody>
                        </table>
                        <?php if($payBtn) {?>
                        <div class="db-mak-pay-bot">
                            <a href="#" onclick="payWithPaystack()" class="waves-effect waves-light btn-large">Make Payment Now</a>
                        </div>
                        <?php }else {
                            echo "Flight Booked";
                        } ?>
                    </div>
                </div>
            </div>
            <!--RIGHT SECTION-->
        </div>
    </section>
