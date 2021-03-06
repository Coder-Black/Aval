<?php require_once "core/controller.php";?>
<?php
if(!isset($_SESSION['adminData'])){
    header('Location: logout.php');
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
                            <a href="main.html"><img src="images/logo.png" alt="" />
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
    <?php include "admin-content.php";?>
    </span>
    <?php include "inc_footer.php";?>
    <!--========= Scripts ===========-->
    <?php include "inc_scripts.php";?>
<script>
    var app = new Vue({
        el: '#dapp',
        data: {

        },
        methods: {

            fdelete (e) {
                var id = e.target.dataset['id']

                axios.get('core/controller.php', {
                    params: {
                        fId: id
                    }
                  })
                  .then(response => {
                        alert(response.data);
                    })
                  .catch(function (error) {
                    alert(error);
                });
            },
            fedit (e) {
                var id = e.target.dataset['id']
                console.log(id);

                axios.get('core/controller.php', {
                    params: {

                    }
                  })
                  .then(response => {
                    
                    })
                  .catch(function (error) {
                    alert(error);
                });
            }
        }
    })
</script>

</body>

</html>