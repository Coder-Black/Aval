<?php require_once "core/controller.php";?>

<?php if(!isset($_SESSION['userData'])){
    header('Location: index.php');
}

?>
<?php if(! isset($_SESSION['userData'])) {
    header('Location: login.php?error=Please Sign in before booking');
}
?>

<?php
    // unset($_SESSION['hash']);

if(isset($_GET['fid'])){
    $id = $_GET['fid'];
    $userId = $_SESSION['userData']['id'];
    $payBtn = true;
    $sql = mysqli_query($con,"SELECT flights.*, airline.name as airline
                              FROM flights
                              JOIN airline ON
                              flights.aid = airline.id
                              WHERE flights.id = '$id' ")or die(mysqli_error($con));
    if(mysqli_num_rows($sql) > 0){
        $data = mysqli_fetch_object($sql);

        if(hasBooked($con, $userId, $id)){
            $payBtn = false;
        }
        else{
            if(!isset($_SESSION['hash'])){
                storeDetails($con, $data->id);
            }
        }

    }else{
        // header('Location: index.php');
    }
}else {
    header('Location: index.php');
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
    <?php include "prof.php";?>


    <?php include "inc_footer.php";?>
    <!--========= Scripts ===========-->
    <?php include "inc_scripts.php";?>
<script src="https://js.paystack.co/v1/inline.js"></script>
<script>
  function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: 'pk_test_baad97319b760bb836a0c1cb81848264cde2fea6',
      email: '<?php echo $_SESSION['userData']['email'] ;?>',
      amount: '<?php echo ($data->price * 100) ?>',
      ref: "<?php echo  $_SESSION['hash'] ?>",
      metadata: {
         custom_fields: [
            {
                display_name: "<?php echo $_SESSION['userData']['fname'] ;?>",
            }
         ]
      },
      callback: function(response) {
        // alert('Whats wrong')
            axios.get('http://localhost/travelz/core/verify.php', {
                params: {
                  ref: response.reference,
                }
              })
              .then(response => {
                if(response.data === 1){
                    alert('Your Transaction was Successful. You will be notofied of any changes made to the flight arrangements');
                    window.href.location = 'index.php';
                }
                else
                    alert(response.data)
                })
              .catch(function (error) {
                alert(error);
            });
        },
    });
    handler.openIframe();
  }
</script>

</body>

</html>
