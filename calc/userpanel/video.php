<?php
session_start();
ob_start();
include "../../includes/config.php";
include "../../includes/func.php";
if($_SESSION['is-logged-calc'] == false && $_SESSION['user']['rank'] == 1)
{
    header("Location: ../../index.php");
}
else
{
    $email = $_SESSION['user']['email'];
    $date = gmdate("m");


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>NetFirm | Потребителски панел</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta name="description" content="Developed By M Abdur Rokib Promy">
        <meta name="keywords" content="Admin, Bootstrap 3, Template, Theme, Responsive">
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- google font -->
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <!-- Theme style -->
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        
        <script src="js/Chart.bundle.js"></script>
        <script src="js/utils.js"></script>


        <style>
            canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
        }
        </style>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <script>
    function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi,    
    function(m,key,value) {
      vars[key] = value;
    });
    return vars;
  }
function start(){
    if(getUrlVars()['vid'] != 1)
    {
    $('#test').modal('show');
    }
    else
    {
    getTheKey(getUrlVars()['keyword']);
    }
}
    </script>
    <body onLoad="start()" class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="#" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                 NetFirm &copy
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->

                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li >

                            
                               
                                <a href="./logout.php"><i class="fa fa-ban fa-fw pull-right"></i> Изход</a>
                            </a>
                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                
                                        <li class="divider"></li>

                                        <li>
                                            
                                        </li>
                                    </ul>

                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php avatar();?>" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p><?php echo strtoupper($_SESSION['user']['email']);?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                                <div class="input-group">
                                    
                                    <span class="input-group-btn">
                                        
                                    </span>
                                </div>
                            </form>
                            <ul class="sidebar-menu">
                                <li>
                                    <a href="./index.php">
                                        <i class="fa fa-user"></i> <span>Профил</span>
                                    </a>
                                </li>


                                <li  >
                                    <a href="./calc.php">
                                        <i class="fa fa-dashboard"></i> <span>Калкулатор</span>
                                    </a>
                                </li>


                                 

                                <li>
                                    <a href="./currency.php">
                                        <i class="fa fa-globe"></i> <span>Парични валути</span>
                                    </a>
                                </li>

                                

                                
                   
                            <?php
                            $rank = $_SESSION['user']['rank'];
                            $q = mysql_query("SELECT * FROM `users` WHERE `email` = '$email' AND `rank` = '$rank'");
                            $row = mysql_num_rows($q);
                            $r = mysql_fetch_assoc($q);
                            if($row != 0 && $r['msg'] != null)
                            {
                                echo '<li class="dropdown">
                        <a href="#lala" class="dropdown-toggle" data-toggle="dropdown" ><i style="color: red;" class="fa fa-bell"></i> Видео конференция
                           <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu" role="listbox">
                           <li>
                           <a href="video.php" style="color: black;" role="option">'.$r['msg'].'</a>
                           </li>';
                            }
                            else
                            {
                                echo '<li class="active" >
                                    <a href="./video.php">
                                        <i class="fa fa-eye"></i> <span>Видео конференции</span>
                                    </a>
                                </li>';
                            }
                            ?>


                                

                            </ul>

                </section>
                <!-- /.sidebar -->
            </aside>



            <!-- Right side column. Contains the navbar and content of the page -->
            
                <!-- __________________________________PANEL4 - LINECHART___________________________________-->
                </section><!-- /.content -->
                
                    <div class="row">
                    <section class="panel">
                                <header style="text-align: center" class="panel-heading">
                           
                                 Видео разговор 
                                </header>

                                       <script>

                            function getTheKey(keyword) {

                                        
                                    

                                        document.getElementById("key").innerHTML ="<iframe class='pull-right'    style='width: 83%; height: 550px;'                                          frameborder='0'                                          src='https://appr.tc/r/"+ keyword +"' allowfullscreen >                                        </iframe><br /> <br />";
                                    }
                                                     

                        
                            
                                        </script>
                                        <div id="key"></div>
   
<form method="post">  
  <div class="modal fade" id="test" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="text-align: center">Информация за разговора</h4>
        </div>
        <div class="modal-body" style="text-align: center">
        <label>Въведете имейл адреса на събеседника си</label>
          <input type="text" class="form-control" name="email" style="text-align: center" placeholder="example@mail.test">
          <label>Въведете ключовата дума с която събеседникът ви ще се свърже</label>
          <input type="text" class="form-control" id="keyword" name="keyword" style="text-align: center" placeholder="EXAMPLEWORD">
        </div>
        <div class="modal-footer">
          <button class="btn btn-success btn-lg" onload="getTheKey()" name="nextbtn" >Напред</button>
        </div>
      </div>
      
    </div>


  


                                        <?php
                                        if(isset($_POST['nextbtn'])){
                                        $modalemail = htmlspecialchars($_POST['email']);
                                        $keyword = htmlspecialchars($_POST['keyword']);
                                        $text = "Поканени сте на конференция от ".$email.", моля използвайте кода:".$keyword." за да вземете участие!";
                                        if(!empty($keyword))
                                        {
                                            $q = mysql_query("SELECT `video` FROM `users` WHERE `email` = '$modalemail' AND `rank` = '1' ");
                                            $r = mysql_num_rows($q);
                                            if($r != 0)
                                            {
                                                mysql_query("UPDATE `users` SET `msg` = '$text' WHERE `email` = '$modalemail' AND `rank` = '1'");
                                                header("Location: video.php?vid=1&keyword=".$keyword."");

                                            }
                                            else
                                            {
                                                echo "<script>alert('Не успяхме да намерим вашия събеседник!');</script>";
                                            }
                                        }
                                        else
                                        {
                                            echo "<script>alert('Моля въведете информация в полетата!');</script>";
                                        }
                                        }
                                        else
                                        {
                                        }

                                        ?>
                                        </form>

<!--                                         <iframe class="pull-right" 
                                          style="width: 83%; height: 650px;"
                                          frameborder="0" 
                                          src="https://appr.tc/" allowfullscreen >
                                        </iframe> -->
                    </section>
                </div>
                </div>



                <div style="position: fixed; bottom: 0; left: 0; right: 0;" class="footer-main">
                    Copyright &copy NetFirm, 2017
                </div>
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="js/jquery.min.js" type="text/javascript"></script>

        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Director App -->
        <script src="js/Director/app.js" type="text/javascript"></script>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        
    </body>
</html>
<?php
}

?>