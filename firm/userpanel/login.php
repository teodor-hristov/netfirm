<?php
session_start();
ob_start();
require_once "../../includes/config.php";
include "../../includes/func.php";

if($_SESSION['is-logged'] == true || $_SESSION['user']['rank'] == 1)
{
    $UserName = $_SESSION['user']['email'];
    $query = mysql_query("SELECT * FROM `firm` WHERE `email` = '$UserName'");
    $informationchecking = mysql_num_rows($query);
    if($informationchecking != 0)
    {
        header("Location: ./index.php");
    }
    else
    {
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
   <!-- bootstrap 3.0.2 -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- fullCalendar -->
    <!-- <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" /> -->
    <!-- Daterange picker -->
    <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="css/iCheck/all.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <!-- <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" /> -->
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <!-- Theme style -->
    <link href="css/style.css" rel="stylesheet" type="text/css" />
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-black">
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
        <div class="wrapper row-offcanvas row-offcanvas-left">
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
                                <li  >
                                    <a href="./index.php">
                                        <i class="fa fa-user"></i> <span>Профил</span>
                                    </a>
                                </li>


                                <li >
                                    <a href="./stat.php">
                                        <i class="fa fa-dashboard"></i> <span>Приходи</span>
                                    </a>
                                </li>


                                 

                                <li>
                                    <a href="./cost.php">
                                        <i class="fa fa-globe"></i> <span>Разходи</span>
                                    </a>
                                </li>

                                <li >
                                    <a href="./people.php">
                                        <i class="fa fa-gavel"></i> <span>Служители</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="./analystics.php">
                                        <i class="fa fa-glass"></i> <span>Анализ на печалбата</span>
                                    </a>
                                </li>

                                <?php
                                $email = $_SESSION['user']['email'];
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
            <aside class="right-side">
                <!-- Content Header (Page header) -->


                <!-- Main content -->
                <section class="content">

                    <div class="row" style="margin-bottom:5px;">
                    
                  </div>

                
                <section style="overflow-x: hidden;" class="content">
                    <div class="row">                 
                    <div class="row">
                        <div class="col-md-12">
                            <section class="panel">
                              <header class="panel-heading">
                                 Регистрация на фирма
                              </header>
                              <div class="panel-body">
                                  <form class="form-horizontal tasi-form" action="" method="post">
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Име на фирмата</label>
                                          <div class="col-sm-10">
                                              <input name="FirmName" type="text" class="form-control">
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Вид</label>
                                          <div class="col-sm-10">
                                              <select class="form-control m-b-10" name="Type">
                                                  <option value="OOO">OOO</option>
                                              </select>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Уставен капитал</label>
                                          <div class="col-sm-10">
                                              <input name="Capital" type="text" class="form-control">
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Брой работници</label>
                                          <div class="col-sm-10">
                                              <input name="Employees" type="text" class="form-control">
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Адрес на фирмата</label>
                                          <div class="col-sm-10">
                                              <input name="Adress" type="text" class="form-control">
                                              
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Град</label>
                                          <div class="col-sm-10">
                                              <input name="City" type="text" class="form-control round-input">
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Директор на фирмата</label>
                                          <div class="col-sm-10">
                                              <input name="Owner" class="form-control" id="focusedInput" type="text" value="">
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Телефон</label>
                                          <div class="col-sm-10">
                                              <input name="Phone" class="form-control" id="focusedInput" type="text" value="">
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">Вид на данъците</label>
                                          <div class="col-sm-10">
                                              <select name="Typeoftax" class="form-control m-b-10" name="Type">
                                                  <option value="ОСНО">ОСНО</option>
                                                  <option value="ЕНВД">ЕНВД</option>
                                                  <option value="УСН">УСН</option>
                                              </select>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button style="border-radius: 0px;" name="register-me" type="submit" class="btn btn-success">Регистрирай</button>
                                        </div>
                                      </div>
                                      
                                  </form>
                              </div>
                            </section>
                            
                            <?php

                            if(isset($_POST['register-me']))
                            {
                                $email = $_SESSION['user']['email'];
                                $firmname = htmlspecialchars($_POST['FirmName']);
                                $type = "OOO";
                                $adress = htmlspecialchars($_POST['Adress']);
                                $city = htmlspecialchars($_POST['City']);
                                $owner = htmlspecialchars($_POST['Owner']);
                                $phone = htmlspecialchars($_POST['Phone']);
                                $time = date("F j, Y, g:i a");
                                $typeoftax = htmlspecialchars($_POST['Typeoftax']);
                                $employees = htmlspecialchars($_POST['Employees']);
                                $capital = htmlspecialchars($_POST['Capital']);
                                $q = mysql_query("SELECT * FROM `firm` WHERE `email` = '$email'");
                                $check = mysql_num_rows($q);
                                if($check == 0)
                                {
                                    if(empty($firmname) || empty($adress) || empty($city) || empty($owner) || empty($phone)|| empty($typeoftax) || empty($capital) || empty($employees))
                                    {
                                        echo "<h3 style='text-align: center;' class='alert alert-danger'>Моля проверете дали сте попълнили всички полета!</h3>";
                                    }
                                    else
                                    {

                                    mysql_query("INSERT INTO `firm` (`firmname`, `type`, `adress`, `city`, `owner`, `phone`, `email`, `timestamp`, `capital`, `employees`, `typeoftax`) VALUES('$firmname', '$type', '$adress', '$city', '$owner', '$phone', '$email', '$time', '$capital', '$employees', '$typeoftax')");

                                    $i = 1;
                                    while($i <= 12)
                                    {
                                      $i2 = $i++;
                                     mysql_query("INSERT INTO `profit` (`email`, `money`, `description`, `month`, `time`) VALUES('$email', '0', 'none', '$i2', '$time')");
                                     
                                     mysql_query("INSERT INTO `cost` (`email`, `money`, `description`, `month`, `time`) VALUES('$email', '0', 'none', '$i2', '$time')");
                                    }

                                    header("Location: ./index.php");
                                }
                                }
                                else
                                {
                                    header("Location: ./index.php");
                                }
                            }
                                else
                            {

                            }
                        

                            ?>
                            
                        </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
            <div class="footer-main">
                Copyright &copy NetFirm, 2017
            </div>
        </div><!-- ./wrapper -->
         <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="js/jquery.min.js" type="text/javascript"></script>

        <!-- jQuery UI 1.10.3 -->
        <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>

        <script src="js/plugins/chart.js" type="text/javascript"></script>

        <!-- datepicker
        <script src="js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>-->
        <!-- Bootstrap WYSIHTML5
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>-->
        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <!-- calendar -->
        <script src="js/plugins/fullcalendar/fullcalendar.js" type="text/javascript"></script>

        <!-- Director App -->
        <script src="js/Director/app.js" type="text/javascript"></script>

        <!-- Director dashboard demo (This is only for demo purposes) -->
        <script src="js/Director/dashboard.js" type="text/javascript"></script>

        <!-- Director for demo purposes -->
        <script type="text/javascript">
            $('input').on('ifChecked', function(event) {
                // var element = $(this).parent().find('input:checkbox:first');
                // element.parent().parent().parent().addClass('highlight');
                $(this).parents('li').addClass("task-done");
                console.log('ok');
            });
            $('input').on('ifUnchecked', function(event) {
                // var element = $(this).parent().find('input:checkbox:first');
                // element.parent().parent().parent().removeClass('highlight');
                $(this).parents('li').removeClass("task-done");
                console.log('not');
            });

        </script>
        <script>
            $('#noti-box').slimScroll({
                height: '400px',
                size: '5px',
                BorderRadius: '5px'
            });

            $('input[type="checkbox"].flat-grey, input[type="radio"].flat-grey').iCheck({
                checkboxClass: 'icheckbox_flat-grey',
                radioClass: 'iradio_flat-grey'
            });
</script>
<script type="text/javascript">
    $(function() {
                "use strict";
                //BAR CHART
                var data = {
                    labels: ["January", "February", "March", "April", "May", "June", "July"],
                    datasets: [
                        {
                            label: "My First dataset",
                            fillColor: "rgba(220,220,220,0.2)",
                            strokeColor: "rgba(220,220,220,1)",
                            pointColor: "rgba(220,220,220,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(220,220,220,1)",
                            data: [89, 59, 80, 81, 56, 55, 40]
                        },
                        {
                            label: "My Second dataset",
                            fillColor: "rgba(151,187,205,0.2)",
                            strokeColor: "rgba(151,187,205,1)",
                            pointColor: "rgba(151,187,205,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(151,187,205,1)",
                            data: [28, 48, 40, 19, 86, 27, 90]
                        }
                    ]
                };
            new Chart(document.getElementById("linechart").getContext("2d")).Line(data,{
                responsive : true,
                maintainAspectRatio: false,
            });

            });
            // Chart.defaults.global.responsive = true;
</script>
    </body>
</html>
<?php
}
}
else
{
    header("Location: ../login.php");
}

?>