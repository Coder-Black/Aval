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
                                    <th>Paid Status</th>
                                    <th>Status</th>
                                    <th>Details</th>
                                </tr>
                                <?php $sql2 = mysqli_query($con, "SELECT a.name as aname, b.id as bid, f.fcode, f.from, f.to, f.id as fid, f.price, f.ddate, b.pstatus, b.status FROM bookings b 
                           JOIN flights f ON b.fid = f.id 
                           JOIN airline a ON a.id=f.aid
                           WHERE b.user_id = '$id' "); ?>
                                <?php while ($data = mysqli_fetch_object($sql2)) {?>
                                    <tr> 
                                        <td><?php echo $data->aname;?></td>
                                        <td><?php echo $data->from;?></td>
                                        <td><?php echo $data->to;?></td>
                                        <td><?php echo $data->fcode;?></td>
                                        <td> &#x20A6 <?php echo number_format($data->price);?></td>
                                        <td><?php echo $data->ddate;?></td>
                                        <td><?php echo $data->pstatus;?></td>
                                        <td><?php echo $data->status;?></td>
                                        <td><a href="delete.php?id=<?php echo $data->bid; ?>">delete</a></td>
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