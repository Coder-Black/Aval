<section>
    <div class="db">
        <!--LEFT SECTION-->
        <?php include "admin-side.php";?>
        <!--CENTER SECTION-->
        <?php

            function getAir($con, $id)
            {
                $sql = mysqli_query($con, "SELECT name FROM airline WHERE id = '$id' ")or die(mysqli_error($con));
                $datas = mysqli_fetch_object($sql);

                return $datas->name;
            }

            $sql = mysqli_query($con, "SELECT flights.*, airline.id as zid FROM flights
                                       JOIN airline ON flights.aid = airline.id 
                                       ")or die(mysqli_error($con));
        ?>
        <div>
            <div class="db-2-com db-2-main">
                <h4>Admin Panel </h4>
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
                                <th>Action</th>
                            </tr>
                            <?php while ($data = mysqli_fetch_object($sql)) {?>
                                <tr> 
                                    <td><?php echo getAir($con, (int)$data->zid);?></td>
                                    <td><?php echo $data->from;?></td>
                                    <td><?php echo $data->to;?></td>
                                    <td><?php echo $data->fcode;?></td>
                                    <td> &#x20A6 <?php echo number_format($data->price);?></td>
                                    <td><?php echo date("D M j, H:i", strtotime($data->ddate)) ?></td>
                                    <td><a  @click.prevent="fedit" href="#">Edit</a> | 
                                        <a data-id="<?php echo $data->id;?>" @click.prevent="fdelete" href="#">Delete</a></td>
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
