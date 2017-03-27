<?php
session_start();
ob_start();
include "../../includes/config.php";
include "../../includes/func.php";
if($_SESSION['is-logged'] == false || $_SESSION['user']['rank'] == 0)
{
    header("Location: ../index.php");
}
else
{
    $UserMail = $_SESSION['user']['email'];
    $query = mysql_query("SELECT * FROM `firm` WHERE `email` = '$UserMail'");
    $proverka = mysql_num_rows($query);
    if($proverka == 0)
    {
       header("Location: ./login.php"); 
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

          <style type="text/css">

          </style>
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

                    <aside class="right-side">

                


                   <!-- Main content -->
                <section class="content">

                    <div class="row" style="margin-bottom:5px;">


                        <!--<div class="col-md-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-red"><i class="fa fa-check-square-o"></i></span>
                                <div class="sm-st-info">
                                    <span>3200</span>
                                    Total Tasks
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-violet"><i class="fa fa-envelope-o"></i></span>
                                <div class="sm-st-info">
                                    <span>2200</span>
                                    Total Messages
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-blue"><i class="fa fa-dollar"></i></span>
                                <div class="sm-st-info">
                                    <span>100,320</span>
                                    Total Profit
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-green"><i class="fa fa-paperclip"></i></span>
                                <div class="sm-st-info">
                                    <span>4567</span>
                                    Total Documents
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <!-- Main row -->
                    <div style="width: 150%" class="row">

                        <div class="col-md-8">
                            <!--earning graph start-->
                            <section class="panel">
                                <header class="panel-heading">
                                    Приходи
                                </header>
                                <div class="panel-body">
                                    <canvas id="linechart" width="600" height="330"></canvas>
                                </div>
                            </section>

                            <div class="row">
                                  <div class="col-md-5">
                                    <div class="panel">
                                      <header class="panel-heading" style="width: 162%">
                                         Добави приход
                                </header>

                                <ul style="width: 162%" id="lit" class="list-group teammates">
                                  <li  class="list-group-item">                                        
                                        <div class="panel-body">
                                            <form class="form-inline" method="post" id="form" role="form">
                                                <div class="col-sm-10" class="form-group">
                                                    <div>
                                                        <label class="col-sm-2 col-sm-2 control-label">Месец</label> 
                                                    </div>
                                                    <div>
                                                        <select name="month" class="col-sm-3 form-control m-b-12">
                                                            <option value="1">Януари</option>
                                                            <option value="2">Февруари</option>
                                                            <option value="3">Март</option>
                                                            <option value="4">Април</option>
                                                            <option value="5">Май</option>
                                                            <option value="6">Юни</option>
                                                            <option value="7">Юли</option>
                                                            <option value="8">Август</option>
                                                            <option value="9">Септември</option>
                                                            <option value="10">Октомври</option>
                                                            <option value="11">Ноември</option>
                                                            <option value="12">Декември</option>
                                                        </select>
                                                    </div>
                                                </div>                                           
                                            
                                        </div>
                                    </li>

                                    <li  class="list-group-item">                                        
                                        <div class="panel-body">
                                            
                                                <div class="col-sm-4" class="form-group">
                                                    
                                                    <input type="text" class="form-control" name="desc" id="desc" placeholder="Приход">
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    
                                                    <input type="text" class="form-control" name="value" id="value" placeholder="Стойност">
                                                </div> 
                                                <br />
                                                <br />
                                                <button name="addI" onclick="javascript: var form = document.getElementById("form");
                                                form.reset(); " class="btn btn-success"><i class="fa fa-plus"></i> Добави приход</button>  
                                                <?php
                                    if(isset($_POST['addI']))
                                    {
                                    $email = $_SESSION['user']['email'];
                                    $month = $_POST['month'];
                                    $value = htmlspecialchars($_POST['value']);
                                    $desc = htmlspecialchars($_POST['desc']);
                                    $date = gmdate("d-m-Y | H:i:s", strtotime("+2 hours")); 
                                    if(empty($value) || empty($desc))
                                    {
                                        echo "<h3 style='text-align:center;' class='alert alert-warning'>Моля въведете информацията в полетата: Приход и Стойност</h3>";
                                    }
                                    else
                                    {
                                        mysql_query("INSERT INTO `profit` (`email`, `money`, `description`, `month`, `time`) VALUES('$email', '$value', '$desc', '$month', '$date')");
                                        echo "<h3 style='text-align:center;' class='alert alert-success'>Приходът е добавен успешно!</h3>";
                                    }
                                    }
                                    else
                                    {
                                        
                                    }
                                    ?>                                          
                                            </form>
                                        </div>
                                    </li>
                                    
                                    

                                        
                                </ul>
                                
                            </div>

                        </div>
                    </div>

                    

                    <div class="row">
                                  <div class="col-md-5">
                                    <div class="panel">
                                      <header class="panel-heading" style="width: 162%">
                                         Последни 5 въвеждания в отдел приходи
                                </header>
                                <ul style="width: 162%" id="lit" class="list-group teammates">
                                
                                        <?php
                    $email = $_SESSION['user']['email'];
                    $last = mysql_query("SELECT * FROM `profit` WHERE `email` = '$email' ORDER BY `id` DESC LIMIT 5");
                    $number = 1;
                    while($last1 = mysql_fetch_assoc($last))
                    {   
                        
                        $newnumber = $number++;
                        $id = $last1['id'];
                       $lastprofit = $last1['money']; 
                       $lastprofitdesc = $last1['description'];
                       ?>
                       <li id="<?php echo $id;?>" class="list-group-item">                                        
                                        <div id="<?php echo $id;?>" class="panel-body">
                       <b><?php echo $newnumber;?> | </b><b>Стойност:</b><font color="green"><?php echo $lastprofit?> </font>лева | <b>Приход:</b><?php echo $lastprofitdesc;?><a href="" style="color: red; float: right;" id="<?php echo $id;?>" class="fa fa-trash-o delete"></a></div>
                                        </li>
                       <?php
                    }


                    ?>
                                         
                                        
                                
                                </ul>
                                
                            </div>

                        </div>
                    </div>
                    

                  

                  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
                    <script>
$(function(){
$(".delete").click(function(){
    var element = $(this);
    var userid = element.attr("id");
    var info = 'id=' + userid;
    if(confirm("Сигурни ли сте, че желаете да изтриете записа?\nСлед изтриване на записа, моля обновете страницата!"))
    {
        $.ajax({
            url: './delprofit.php',
            type: 'post',
            data: info,
            success: function(){

            }
        });
        $(this).parent().fadeOut(300, function(){
            $(this).remove();
            window.location.href = './stat.php';
            
        });
    };
    return false;
});

});
</script> 

                
                <div class="footer-main">
                    Copyright &copy NetFirm, 2017
                </div>
            </aside><!-- /.right-side -->

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
<?php
    include "../../includes/months.php";
?>
<script type="text/javascript">
    $(function() {
                "use strict";
                //BAR CHART
                var data = {
                    labels: ["Януари", "Февруари", "Март", "Април", "Май", "Юни", "Юли", "Август", "Септември", "Октомври", "Ноември", "Декември"],
                    datasets: [
                        
                        {
                            label: "My Third dataset",
                            fillColor: "rgba(0, 205, 102, 0.2)",
                            strokeColor: "rgba(0, 205, 102, 1)",
                            pointColor: "rgba(0, 205, 102, 1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(151,187,205,1)",
                            data: [<?php echo $qnuari2;?>, <?php echo $fevruari2;?>, <?php echo $mart2;?>, <?php echo $april2;?>, <?php echo $mai2;?>, <?php echo $uni2;?>, <?php echo $uli2;?>, <?php echo $avgust2;?>, <?php echo $septemvri2;?>, <?php echo $oktomvri2;?>, <?php echo $noemvri2;?>, <?php echo $dekemvri2;?>]
                        }
                    ]
                };
            new Chart(document.getElementById("linechart").getContext("2d")).Line(data,{
                responsive : true,
                bezierCurve: false,
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
?>
