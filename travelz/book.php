<section>
        <div class="db">
            <!--LEFT SECTION-->
            <?php include "inc_left.php";?>
            <!--CENTER SECTION-->
            <div class="db-2">
                <div class="db-2-com db-2-main">
                    <h4>My Bookings History</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th>Airline</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Flight Code</th>
                                    <th>Price</th>
                                    <th>Date</th>
                                    <th></th>
                                    <th></th>
                                    <th>Details</th>
                                </tr>
                                <?php while ($data = mysqli_fetch_object($sql)) {?>
                                    <tr> 
                                        <td><?php echo getAir($con, (int)$data->aid);?></td>
                                        <td><?php echo $data->from;?></td>
                                        <td><?php echo $data->to;?></td>
                                        <td><?php echo $data->fcode;?></td>
                                        <td> &#x20A6 <?php echo number_format($data->price);?></td>
                                        <td><?php echo $data->ddate;?></td>
                                        <td><?php echo $data->pstatus;?></td>
                                        <td><?php echo $data->status;?></td>
                                        <td><a href=""<?php echo $data->id;?>>details</a></td>
                                    </tr>
                                <?php } ?>                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--RIGHT SECTION-->
        </div>
</section>