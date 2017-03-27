<?php
error_reporting(0);
ob_start();
session_start();
require_once "../includes/config.php";
if($_SESSION['is-logged-calc'] == true)
{
	header("Location: ./userpanel/index.php");
}
else
{
	        $lang = $_GET['lang'];
        if(file_exists("language/".$lang."/lang.php"))
        {
            include "language/".$lang."/lang.php";
        }
        else
        {
            include "language/en/lang.php";
        }
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title;?></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/flag-icon.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style="overflow: hidden;">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="../"><i class="fa fa-arrow-left"></i> <?php echo $backtoportal;?></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                	
                    <li>
                        <a href="#about" class="fa fa-facebook"></a>
                    </li>
                    <li>
                        <a href="#services" class="fa fa-twitter"></a>
                    </li>
                    <li>
                        <a href="#contact" class="fa fa-github"></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <!-- Header -->
    <a name="about"></a>
        <video style="position: fixed; z-index: -800;  width: 100%; height: auto;" autoplay loop>
  <source src="video/moneybg3.mp4" type="video/mp4">
  
</video>
    <center>
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1 style="color: white;" class="animated bounceIn"><?php echo $header;?></h1>
                        <h3 style="color: white; " class="animated bounceIn"><?php echo $subtitle;?></h3>
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                            <li>
                                <a href="#" class="btn btn-default btn-lg animated bounce" data-toggle="modal" data-target="#register"><i class="fa fa-area-chart"></i> <span class="network-name " ><?php echo $register;?></span></a>
                            </li>
                            <li>
                            	<div class="dropdown">
							    <button class="btn btn-default btn-lg dropdown-toggle animated bounce" type="button" id="menu1" data-toggle="dropdown"><i class="fa fa-flag"></i> <?php echo "$language";?>
							    <span class="caret"></span></button>
							    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
							      <li role="presentation"><a role="menuitem" tabindex="-1" href="./?lang=en">English</a></li>
							      <li role="presentation"><a role="menuitem" tabindex="-1" href="./?lang=ru">Русский</a></li>
							      <li role="presentation"><a role="menuitem" tabindex="-1" href="./?lang=bg">Български</a></li>

							    </ul>
							  </div>
                            </li>
                            <li>
                                <a href="#" class="btn btn-default btn-lg animated bounce" data-toggle="modal" data-target="#login"><i class="fa fa-newspaper-o"></i> <span class="network-name"  > <?php echo $login;?></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            </center>

            <style>
                .form
                {
                    padding: 15px;
                    width: 45%;
                    border: 1px solid #e5f9f7;
                }



            </style>







    <!-- register -->
  <div class="modal fade" id="register" role="dialog">
    <div class="modal-dialog modal-md">
      <div style="border-radius: 0px; background-color: #e5e2de;" class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><div class="fa fa-close"></div></button>
          
        </div>
        <div class="modal-body">
            <form method="post" action="" >
                <div class="imgcontainer">
                    <center>
                        <img src="img/register.png" alt="Avatar" class="avatar">
                        <h3><?php echo $regmodheader;?></h3>
                    </center>
                </div>
                <br />
                <br />
                <div class="container">
                    <label><b><?php echo $regmodmail;?></b></label>
                    <br />
                    <input class="form" type="text" minlength="6" placeholder="<?php echo $regmodmail;?>" name="regmail" required>
                    <br />
                    <br />
                    <label><b><?php echo $regmodpass;?></b></label>
                    <br>
                    <input class="form" style="" minlength="6" type="password" placeholder="<?php echo $regmodpass;?>" name="regpass" required>
                    <br />
                    <br />
                    <br />
                    <label><b><?php echo $regmodpassconf;?></b></label>
                    <br>
                    <input class="form" style="" minlength="6" type="password" placeholder="<?php echo $regmodpassconf;?>" name="confpass" required>
                    <br />
                    <br />
                    <br />
                    
                </div>
                &nbsp; &nbsp; &nbsp; 
                <button type="submit" name="register" class="btn btn-success test" style="border-radius: 0px; position: relative; left: 1;"><?php echo $regmodbtn;?></button>
            </form>
        </div>




        <div style="background-color:#f1f1f1" class="modal-footer">
          
            <?php 
            if(isset($_POST['register']))
            {
                $regmail = htmlspecialchars($_POST['regmail']);
                $regpass = htmlspecialchars(trim($_POST['regpass']));
                $regconf = htmlspecialchars(trim($_POST['confpass']));
                $q = mysql_query("SELECT * FROM `users` WHERE `email` = '$regmail' AND `rank` = '0'");
                $q2 = mysql_query("SELECT * FROM `users`");
                $arrayid = mysql_num_rows($q2);
                $check = mysql_num_rows($q);
                if(filter_var($regmail, FILTER_VALIDATE_EMAIL))
                {
                    if($regpass == $regconf)
                    {
                        if($check == 0)
                        {
                        mysql_query("INSERT INTO `users` (`email`, `password`, `rank`) VALUES('$regmail', '$regpass', '0')");
                        $_SESSION['user']['email'] = $regmail;
                        $_SESSION['user']['id'] = $arrayid + 1;
                        $_SESSION['user']['rank'] = 0;
                        $_SESSION['is-logged-calc'] = true;
                        header("Location: ./userpanel/index.php");
                        }
                        else
                        {
                           echo "<p style='text-align:center;' class='alert alert-danger'>$registereduser!</p>"; 
                        }
                    }
                    else
                    {
                       echo "<p style='text-align:center;' class='alert alert-danger'>$passwordconfirmation</p>"; 
                    }
                }
                else
                {
                    echo "<p style='text-align:center;' class='alert alert-danger'>$emailproblem</p>";
                }
            }
            else
            {
                
            }
            ?>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="login" role="dialog">
    <div class="modal-dialog modal-md">
      <div style="border-radius: 0px; background-color: #e5e2de;" class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><div class="fa fa-close"></div></button>
          
        </div>
        <div class="modal-body">
            <form method="post" action="" >
                <div class="imgcontainer">
                    <center>
                        <img src="img/login.png" alt="Avatar" class="avatar">
                        <h3><?php echo $loginmodalheader;?></h3>
                    </center>
                </div>
                <br />
                <br />
                <div class="container">
                    <label><b><?php echo $loginmodalusername;?></b></label>
                    <br />
                    <input class="form" type="text" placeholder="<?php echo $loginmodalheader;?>" name="mail" required>
                    <br />
                    <br />
                    <label><b><?php echo $loginmodalpassword;?></b></label>
                    <br>
                    <input class="form" style="" type="password" placeholder="<?php echo $loginmodalpassword;?>" name="pass" required>
                    <br />
                    <br />
                    <br />
                </div>
                &nbsp; &nbsp; &nbsp; 
                <button type="submit" name="login" class="btn btn-success" style="border-radius: 0px; position: relative; left: 1;">
                    <?php echo $loginmodalbtn;?>
                </button>
            </form>
        </div>



        <?php
        if(isset($_POST['login']))
        {
        $mail = htmlspecialchars($_POST['mail']);
        $pass = htmlspecialchars(trim($_POST['pass']));
        $q = mysql_query("SELECT * FROM `users` WHERE `email` = '$mail' AND `rank` = '0'");
        $check = mysql_num_rows($q);
        $r = mysql_fetch_assoc($q);
            if(!empty($mail) || !empty($pass))
            {
                if($check != 0)
                {        
                    if($pass == $r['password'] && $mail = $r['email'])
                    {
                        $_SESSION['user'] = $r;
                        $_SESSION['is-logged-calc'] = true;
                        header("Location: ./userpanel/index.php");
                    }
                    else
                    {
                        echo "<p style='text-align:center;' class='alert alert-danger'>$loginwrongpasswordorusername</p>";
                    }
                }
            }
            else
            {
                echo "<p style='text-align:center;' class='alert alert-danger'>$loginemptyfields</p>";
            }
        }
        else
        {

        }

        ?>

        <div style="background-color:#f1f1f1" class="modal-footer">
          

      </div>

    </div>
  </div>
</div>


    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
<?php
}
?>
