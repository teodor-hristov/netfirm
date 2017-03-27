<?php
error_reporting(0);
session_start();
session_destroy();
$lang = $_GET['lang'];
$file = "firm/language/".$lang."/lang.php";
if(file_exists($file))
{
  include "$file";
}
else
{
  include "firm/language/en/lang.php";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Meetup is a free responsive single page bootstrap template by designerdada.com">
  <meta name="author" content="Akash Bhadange">
  <title>NetFirm | <?php echo $generaltitle;?></title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/themify-icons.css" rel="stylesheet">
  <link href='css/dosis-font.css' rel='stylesheet' type='text/css'>
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>
    <body style="color: inherit;" onload="startTime()" id="page-top" data-spy="scroll" data-target=".side-menu">
      <nav class="side-menu">
        <ul>
          <li class="hidden active">
            <a class="page-scroll" href="#page-top"></a>
          </li>
          <li>
            <a href="#home" class="page-scroll">
              <span class="menu-title"><?php echo $generaltitle;?></span>
              <span class="dot"></span>
            </a>
          </li>
          <li>
            <a href="#speakers" class="page-scroll">
              <span class="menu-title"><?php echo $generalscrollsecond;?></span>
              <span class="dot"></span>
            </a>
          </li>


        </ul>
      </nav>
      <div class="container-fluid">
        <!-- Start: Header -->
        <div style="background: url(img/background.png);" class="row hero-header" id="home">
          <div class="col-md-7">
            <img src="img/meetup-logo2.png" class="logo">
            <h1><?php echo $generalheaderline1;?></h1>
            <h1><?php echo $generalheaderline2;?></h1>
            <h3 id="clock"></h3>
            <a href="#speakers" class="btn btn-lg btn-red"><?php echo $generalgetstartedbtn;?> <span class="ti-arrow-down"></span></a>
            <div class="dropdown">
                  <button class="btn btn-default btn-lg dropdown-toggle" type="button" id="menu1" data-toggle="dropdown"><i class="fa fa-flag"></i> <?php echo "$generallangbtn";?>
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="./?lang=en">English</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="./?lang=ru">Русский</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="./?lang=bg">Български</a></li>

                  </ul>
                </div>

          </div>
          <div class="col-md-5 hidden-xs">
            <img src="img/rocket3.png" class="rocket animated bounce">
          </div>
        </div>
        <!-- End: Header -->
      </div>
      <div class="container">
        

        <!-- Start: Speakers -->
        <div class="row me-row content-ct speaker" id="speakers">
          <h2 class="row-title"><?php echo $generalmodeheader;?></h2>
          <a href="./firm/">
          <div class="col-md-4 col-sm-6 feature">
            <img src="img/speaker1.png" class="speaker-img">
            <h3>NetFirm | <?php echo $generalbusinessh;?></h3>
            <p><?php echo $generalbusinesssh;?></p>
            <ul class="speaker-social">
              <li><a href="#"><span class="ti-facebook"></span></a></li>
              <li><a href="#"><span class="ti-twitter-alt"></span></a></li>
              <li><a href="#"><span class="ti-linkedin"></span></a></li>
            </ul>
          </div>
          </a>
          <a href="./calc/">
          <div class="col-md-4 col-sm-6 feature">
            <img src="img/speaker2.png" class="speaker-img">
            <h3>NetFirm | <?php echo $generalpersonalh;?></h3>
            <p><?php echo $generalpersonalsh;?></p>
            <ul class="speaker-social">
              <li><a href="#"><span class="ti-facebook"></span></a></li>
              <li><a href="#"><span class="ti-twitter-alt"></span></a></li>
              <li><a href="#"><span class="ti-linkedin"></span></a></li>
            </ul>
          </div>
          </a>
          <a href="./info/">
          <div class="col-md-4 col-sm-6 feature">
            <img src="img/speaker3.png" class="speaker-img">
            <h3>NetFirm | <?php echo $generalnfoh;?></h3>
            <p><?php echo $generalnfosh;?></p>
            <ul class="speaker-social">
              <li><a href="#"><span class="ti-facebook"></span></a></li>
              <li><a href="#"><span class="ti-twitter-alt"></span></a></li>
              <li><a href="#"><span class="ti-linkedin"></span></a></li>
            </ul>
          </div>
          </a>
          
        <!-- End: Speakers -->
      </div>

      <footer style="padding: 25px; background: none; color: black;">
        <p style="text-align: right;"><?php echo $generalcopyrights;?></p>
      </footer>

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="js/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>
      <script src="js/jquery.easing.min.js"></script>
      <script src="js/scrolling-nav.js"></script>
      <script src="js/validator.js"></script>
      <!-- Google Analytics -->
      <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-29231762-2', 'auto');
      ga('send', 'pageview');
      </script>
      <script>
      function startTime() {
          var today = new Date();
          var h = today.getHours();
          var m = today.getMinutes();
          var s = today.getSeconds();
          m = checkTime(m);
          s = checkTime(s);
          document.getElementById('clock').innerHTML =
          h + ":" + m + ":" + s;
          var t = setTimeout(startTime, 500);
      }
      function checkTime(i) {
          if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
          return i;
}
</script>
    </body>
    </html>