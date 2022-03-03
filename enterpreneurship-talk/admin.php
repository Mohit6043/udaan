<?php 
session_start();

// if (!isset($_SESSION['email'])) {
//    header('location:login.php');
//    die();
// }
include '../../db/db.php';
mysqli_select_db($con,'eventribe');


 ?>
 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Evento -Event Html Template">
    <meta name="keywords" content="Evento , Event , Html, Template">
    <meta name="author" content="ColorLib">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title> Book Your Event</title>
    <link href="assets/css/bootstrap.min.css%2Bfont-awesome.min.css%2Bet-line.css%2Bionicons.min.css%2Bowl.carousel.min.css%2Bowl.theme.default.min.css%2Banimate.min.css.pagespeed.cc.0vfyByTh0R.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="../assets/css/style.css" /> -->
    <link rel="stylesheet" type="text/css" href="../assets/css/lightslider.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="../assets/css/A.main.css.pagespeed.cf.TDBZLiA0of.css" rel="stylesheet">
</head>

<body>
    <div class="loader">
        <div class="loader-outter"></div>
        <div class="loader-inner"></div>
    </div>



    <section class="bg-img pt100 pb100" style="background-image:url(../assets/img/bg/slider1.jpeg)">
        <!-- <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-9 text-md-left text-center color-light">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus massa nec gravida tempus. Integer iaculis in aazzzCurabitur a pulvinar nunc. Maecenas laoreet finibus lectus, at volutpat ligula euismod.
                </div>
            </div>
        </div> -->
    </section>
    <section style="margin-top: 4%;" id="about">
        <div class="container">
            <div class="section_title">
                <h3 class="title">
                    Udaan Admin Panel
                </h3>
            </div>
            
            </div><br>




        </div>
    </section>

    <section class="bg-img pt100 pb100">
        <div class="container">
            <div class="section_title mb30">
                <h3 class="title">
                    All REGISTRATIONS
                </h3>
            </div>
                <div class="col-12 col-md-12 col-sm-6 text-md-center text-left">
                    <form action="" method="POST">
                    <input type="hidden" value="t">
                    <button class="btn btn-rounded  btn-primary" id="asc" type="submit" name="asc">Sort By Name</button>
                    <button class="btn btn-rounded  btn-primary" id="time" type="submit" name="time">Sort By Time</button>
                    </form>
                    <table id="example" style="width:100%; overflow: scroll;" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Course</th>
                                <th>Dept</th>
                                <th>Que</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php 
                        $sql = "SELECT * FROM udaaan_enterpreneurship ORDER BY ID DESC";
                        $sqlasc = "SELECT * FROM udaaan_enterpreneurship ORDER BY first_name ASC";

                        if (isset($_POST['asc'])) {
                            # code...
                            $sql = $sqlasc;
                        }elseif(isset($_POST['time'])){
                            $sql = $sql;

                        }
                        
                        $results = mysqli_query($con,$sql) or die("failed to query database".mysqli_error());
                        // $rows = mysqli_fetch_array($results);
                        if($results->num_rows > 0){
                            while($rows = $results->fetch_assoc()){
                            $ID = $rows['ID'];
                    ?>
                            <tr>
                                <td class="nr">
                                    <script type="text/javascript">
                                        var a = document.getElementsByClassName("nr");
                                            for (var i = 0; i < a.length; i++) {
                                            a[i].innerHTML = (i+1)+".";
                                            }
                                    </script>
                                </td>
                                <td>
                                    <?php echo ($rows['first_name']);  ?>
                                </td>
                                <td>
                                    <?php echo ($rows['email']);  ?>
                                </td>
                                <!-- <td>
                                    <?php echo "<a class='boxed_btn' href='https://wa.me/91".$rows["phone"]."' target='_blank'><i class='fab fa-whatsapp fa-2x'></i> </a>";?>
                                </td> -->
                                <td>
                                    <?php echo "<a class='boxed_btn' href='tel:91".$rows["phone"]."' target='_blank'>".$rows['phone']."</a>";?>
                                </td>
                                <td>
                                    <?php echo ($rows['course']);  ?>
                                </td>
                                <td>
                                    <?php echo ($rows['dept']);  ?>
                                </td>
                                <td>
                                    <?php echo ($rows['que']);  ?>
                                </td>
                            </tr>

                    <?php }
                        }else{ 
                    ?>

                    <?php 
                        } 
                    ?>

                        </tbody>
                    </table>
                </div>
        </div>
    </section>


    
    <div class="copyright_footer">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-12 justify-content-center">
                    <p class="justify-content-center text-center">
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved <br> This Registration Page is made with <i class="fas fa-heart" aria-hidden="true"></i> by <a style="background-color: transparent;color: red" href="https://eventribe.in" target="_blank">Eventribe</a>
                    </p>
                </div>
            </div>
        </div>
    </div>


    <script src="../assets/js/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="js/JQuery3.3.1.js"></script> -->
    <!-- <script type="text/javascript" src="JQuery3.3.1.js"></script> -->

    <script src="../assets/js/popper.js%2Bbootstrap.min.js%2Bwaypoints.min.js.pagespeed.jc.LKOq-b9g4Y.js"></script>
    <script>
        eval(mod_pagespeed_k9g_vBlmwz);
    </script>
    <script>
        eval(mod_pagespeed_UsxcIb_Va4);
    </script>
    <script>
        eval(mod_pagespeed_GKAxDgulnd);
    </script>

    <script src="../assets/js/owl.carousel.min.js%2Bparallax.min.js%2Bjquery.counterup.min.js%2Bjquery.countdown.min.js%2Bwow.min.js.pagespeed.jc.1-9Y1E28vd.js"></script>
    <script>
        eval(mod_pagespeed_z6ItN3gVDF);
    </script>

    <script>
        eval(mod_pagespeed_XxI10adJ8b);
    </script>

    <script>
        eval(mod_pagespeed_mk4lZ3c1zv);
    </script>

    <script>
        eval(mod_pagespeed_WBFzx29H2w);
    </script>

    <script>
        eval(mod_pagespeed_ALkhNgDran);
    </script>

    <script src="../assets/js/main.js"></script>
    <script async src="../https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js" data-cf-beacon="{" rayId ":"6696c1a37a79e28d ","token ":"cd0b4b3a733644fc843ef0b185f98241 ","version ":"2021.6.0 ","si ":10}"></script>
</body>

</html>