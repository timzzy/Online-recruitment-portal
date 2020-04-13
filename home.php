<?php
  
   require_once('pages/track_ip.php');
   
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Application Portal - Obafemi Awolowo University</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="assets/css/main.css" />
        <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
        <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
        <link rel="shortcut_icon" href="favicon.ico" type="image/x-icon" />
    </head>
    <body>

        <!-- Wrapper -->
        <div id="wrapper">


            <!-- Header -->
            <header id="header">
                <div class="logo">

                    <img src="images/logo_oau.png" width="80" height="80">
                    <!--<i class="fa fa-user" ostyle="font-size:36px"></i>-->
                </div>
                <div class="content">
                    <div class="inner">
                        <h1>Obafemi Awolowo University
                        </h1>
                        <h2><!--[--> <a href="">Recruitment Portal</a> </h2>
                    </div>
                </div>
                <nav>
                    <ul>

                            <?php

                                 $sta=mysqli_query($con,"SELECT * from reg_form  where typee='FORM_STATUS'  order by rec_id  desc limit 1 ")or die('Unable');
                                 $row=mysqli_fetch_array($sta);
                                 $dstatus=$row['status'];
                                 if (countrows($sta) == 0) {
                                //insert into the table if record not found
                                mysqli_query($con, "INSERT into reg_form(typee,status)values('FORM_STATUS','ACTIVE') ");
                              }//ends: If
                                 $link = ($dstatus=="ACTIVE")?'./?rdr=start1':'coming_soon/';// for click to apply
                                 $link2 = ($dstatus=="ACTIVE")?'./?rdr=complaint':'';// for submit complaint link
                          ?>


                          <li><a href="<?php echo $link;?>" style="background-color:#000000;">Click here to apply &raquo; &nbsp;&nbsp;&nbsp;</a></li>
                          <li><a href="./?rdr=advert" style="background-color:#000000;">Advert &raquo;</a></li>
                          <li><a href="<?php echo $link2;?>" style="background-color:#000000;">Submit complaint &raquo;</a></li>
                         
                            
        <!--                   <li><a href="#about">About us</a></li>
                        <li><a href="#intro">COUNCIL AFFAIRS</a></li>
                        <li><a href="#work">ACADEMIC AFFAIRS</a></li>

                        <li><a href="#contact">human resources</a></li>-->

                    </ul>
                </nav>
            </header>

        </div>

        <div id="bg"></div>

        <!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/skel.min.js"></script>
        <script src="assets/js/util.js"></script>
        <script src="assets/js/main.js"></script>

    </body>
</html>
