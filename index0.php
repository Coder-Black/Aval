<?php require_once "core/controller.php";?>
<!DOCTYPE html>
<html lang="en">

<?php include "inc_head.php";?>

<body>
    <!-- Preloader -->
  <!--  <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>-->

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

                              <?php if(!isset($_SESSION['userData'])) {?>
                                  <li><a href="login.php">Sign In</a></li>
                                  <li><a href="register.php"?>Sign Up</a></li>
                              <?php }
                                else {
                                 ?>
                                  <li><a href="userpage.php">Profile</a>
                                  </li>
                                  <li><a href="logout.php">Logout</a>
                                  </li>
                                    <?php
                                }
                              ?>
                                </li>
                                <li><a href= "admin.php">Admin Login</a>
                                  <li><a href= "http://theufuoma.com/">Explore Destinations</a>

                            </ul>
                        </div>
                        <div class="ed-com-t1-social">
                            <ul>
                                <li><a href="facebook.com"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                </li>
                                <li><a href="instagram.com"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                </li>
                                <li><a href="twitter.com"><i class="fa fa-twitter" aria-hidden="true"></i></a>
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

    <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5ab4b9aed7591465c708d67d/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

    <!--HEADER SECTION-->
    <?php include "home.php";?>


    <?php include "inc_footer.php";?>
    <!--========= Scripts ===========-->
    <?php include "inc_scripts.php";?>
<script>

    let Flight = {
        props: [
            'flight'
        ],
        computed: {
            getPrice () {
                return this.flight.price.toLocaleString()
            },

            lin () {
                return `flight-details.php?fid=`+this.flight.id
            },
            book () {
                return `profile.php?fid=`+this.flight.id
            }
        },

        data () {
            return {
                //
            }

        },

        template: `
            <tr>
                <td><a href="#" @click.prevent class="events-title">{{ flight.airline }}</a> </td>
                <td>{{ flight.from }}</td>
                <td>{{ flight.to }}</td>
                <td>{{ flight.fcode }}</td>
                <td>&#x20A6{{ getPrice }}</td>
                <td>{{ flight.date }}</td>
                <td><a :href="lin" class="link-btn btn-xs">Details</a> </td>
                <td><a :href="book" class="link-btn btn-xs">Book Now</a> </td>
            </tr>
        `
    };

    let Flights = {
        props: [
            'sdata'
        ],
        components: {
            'flight': Flight
        },
        data () {
            return {
                flightzz: this.sdata,
                title: 'Results',
            }
        },
        template: `
            <section id="results">
                <div class="rows tb-space">
                    <div class="container events events-1" id="inner-page-title">
                        <!-- TITLE & DESCRIPTION -->
                        <div class="spe-title">
                            <h2>Top <span>{{this.title}}</span></h2>
                            <div class="title-line">
                                <div class="tl-1"></div>
                                <div class="tl-2"></div>
                                <div class="tl-3"></div>
                            </div>
                            <p>Book Flights to Your Favorite Destination</p>
                        </div>

                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>Class</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Flight Code</th>
                                    <th>Price</th>
                                    <th>Date</th>
                                    <th></th>
                                    <th></th>
                                </tr>

                                <flight v-for="data in flightzz" :flight="data"></flight>

                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        `
    };

    var app = new Vue({
        el: '#app',
        data: {
            search: {
                from: '',
                to:   '',
                dat: ''
            },
            flightData: []
        },
        components: {
            'flights': Flights
        },
        methods: {
            processData(){

                axios.get('core/controller.php', {
                    params: {
                      sach:  1,
                      from: this.search.from,
                      to: this.search.to,
                      date: this.search.dat
                    }
                  })
                  .then(response => {
                    console.log(response);
                    window.res = response;
                    if(response.data.status === 1){
                        console.log(response.data.datas)
                        this.flightData =  response.data.datas;
                    }
                    else
                        alert(response.data.msg)
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
