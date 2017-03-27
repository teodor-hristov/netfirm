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

                <!-- Main content -->
                <section style="overflow-x: hidden;" class="content">
                    
                <div class="row" style="margin-bottom:5px;">

                    <!-- __________________PANEL1 - CHART_____________________-->   
                      <div class="col-md-6">
                            <div class="panel">
                                <header class="panel-heading">
                                    Разпределение на разходите
                                </header>
                                <div class="panel-body">
                                                <div style="margin: auto;  width: 90%;">
                                                    <canvas id="chart-area" /></canvas>
                                                </div>
    <!-- <button id="randomizeData">Randomize Data</button> 
    <button id="addDataset">Add Dataset</button>
    <button id="removeDataset">Remove Dataset</button> -->
               <?php
                include "../../includes/monthsc.php";
                include "../../includes/months.php";
           ?>
    <script>
    var randomScalingFactor1 = function() {
        return Math.round(Math.random() * 100);
    };


    var config = {
        type: 'pie',
        data: {
            datasets: [{
                data: [<?php echo round($dzpoo2, 2);?>,<?php echo round($zaplati3 - $dzpoo2, 2);?>,<?php echo round($finalc*-1, 2);?>],
                backgroundColor: [
                "#FF6699",
                "#B94AB1",
                "#923ABF"
                ],
                label: 'Dataset 1'
            }],
            labels: [
                "Разходи за осигуровки",
                "Разходи за заплати",
                "Разходи за материали"
            ]
        },
        options: {
            responsive: true
        },
        legend: {
                position: 'right'
            }

    };

    function test1() {
        var ctxl = document.getElementById("chart-area").getContext("2d");
        window.myPie = new Chart(ctxl, config);
    };

    </script>
    
                    
                    </div><!-- /.panel-body -->
                </div><!-- /.panel -->
           </div>
           
                 <!-- ___________________PANEL2_____________________-->   
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel">
                                <header class="panel-heading">
                                    Приходи и разходи
                                </header>

                                <ul style="width: 100%" id="lit" class="list-group teammates">
                                    <li  class="list-group-item">                                        
                                        <div class="panel-body">
                                        <div >
                                             <form class="form-horizontal tasi-form" method="get">
                                      <div class="form-group has-success">
                                          <label class="col-sm-2 control-label col-lg-7 " style="font-size: 21px;" for="inputSuccess">ПРИХОДИ</label>
                                          <div class="col-lg-4">
                                              <input type="text" readonly value="<?php echo round($final, 2);?>" class="form-control input-lg m-b-10" id="inputSuccess">
                                          </div>
                                      </div>
                                      <div class="form-group has-error">
                                          <label class="col-sm-3 control-label col-lg-7" style="font-size: 21px;" for="inputError">РАЗХОДИ ЗА ЗАПЛАТИ</label>
                                          <div class="col-lg-4">
                                              <input type="text" readonly value="<?php echo round($zaplati3, 2);?>" class="form-control input-lg m-b-10" id="inputError">
                                          </div>
                                      </div>
                                      <div class="form-group has-error">
                                          <label class="col-sm-2 control-label col-lg-7" style="font-size: 20px;" for="inputError">РАЗХОДИ ЗА ОСИГУРОВКИ</label>
                                          <div class="col-lg-4">
                                              <input type="text" readonly value="<?php echo round($dzpoo2, 2);?>" class="form-control input-lg m-b-10" id="inputError">
                                          </div>
                                      </div>
                                      <div class="form-group has-error">
                                          <label class="col-sm-2 control-label col-lg-7"  style="font-size: 21px;" for="inputError">РАЗХОДИ ЗА МАТЕРИАЛИ</label>
                                          <div class="col-lg-4">
                                              <input type="text" readonly value="<?php echo round($finalc*-1, 2);?>" class="form-control input-lg m-b-10" id="inputError">
                                          </div>
                                      </div>
                                  </form>
                                  </div>
                                    </form>
                                </div>
                            </div>
                        </div>                          
                    </div> <!-- row end -->


                <!-- __________________________________PANEL3___________________________________-->
                <div class="col-md-12">
                    <section class="panel">
                                <header class="panel-heading">
                                 Анализ на печалбата
                                </header>
                                <div class="panel-body">
                                    <div class="panel-body">                                                
                                        <div class="form-group has-warning">
                                            <div class="col-lg-5">
                                                <h4 style="position: relative; left: 70%; color: #ff9900;" class="col-sm-2 control-label col-lg-2" for="inputWarning"><b>ПЕЧАЛБА</b></h4>
                                            </div>
                                            <div class="col-lg-2">
                                                <input type="text" readonly value="<?php echo $final - $zaplati3 + $finalc;?>" class="form-control input-lg m-b-10" id="inputWarning">
                                            </div>
                                        </div>                                     
                                    </div>
                                    <div class="panel-body">
                                    <div class="col-lg-5">
                                                <label class="col-sm-2 control-label col-lg-4" style="left:70%; font-size: 11px; font-weight: bold;" for="inputSuccess">КОРПОРАТИВЕН ДАНЪК:</label>  
                                            </div>
                                            <div class="col-lg-2">
                                                <input type="text" readonly value="<?php echo round(0.1 * ($final - $zaplati3 + $finalc), 2);?>" class="form-control" id="inputWarning">
                                            </div>
                                    </div>

                                    <br/>
                                    <div class=" has-success">
                                            <div class="col-lg-5">
                                                <h4 style="position: relative; left: 70%; color: green; font-size: 15px;" class="col-sm-2 control-label col-lg-2" for="inputWarning"><b>ОКОНЧАТЕЛНА ПЕЧАЛБА</b></h4>
                                            </div>
                                            <div class="col-lg-2">
                                                <input type="text" readonly class="form-control input-lg m-b-10" value="<?php echo round(0.9 * ($final - $zaplati3 + $finalc), 2);?>" id="inputSuccess">
                                            </div>
                                        </div> 
                                    </div>
                    </section>
                </div>


                <!-- __________________________________PANEL4 - LINECHART___________________________________-->
                <div class="col-md-12">
                    <section class="panel">
                                <header class="panel-heading">
                           
                                 Анализ на печалбата
                                </header>
                                <div class="panel-body">
                                    <div class="panel-body">
                                        <div>
                                            <canvas id="canvas"></canvas>
                                        </div>

    
    <script>
        var color = Chart.helpers.color;
        var barChartData = {
            labels: ["Януари", "Февруари", "Март", "Април", "Май", "Юни", "Юли", "Август", "Септември", "Октомври", "Ноември", "Декември"],
            datasets: [{
                type: 'bar',
                label: 'Разход',
                backgroundColor: color(window.chartColors.red).alpha(0.2).rgbString(),
                borderColor: window.chartColors.red,
                data: [<?php echo $qnuari2c;?>, <?php echo $fevruari2c;?>, <?php echo $mart2c;?>, <?php echo $april2c;?>, <?php echo $mai2c;?>, <?php echo $uni2c;?>, <?php echo $uli2c;?>, <?php echo $avgust2c;?>, <?php echo $septemvri2c;?>, <?php echo $oktomvri2c;?>, <?php echo $noemvri2c;?>, <?php echo $dekemvri2c;?>]
            }, {
                type: 'line',
                label: 'Печалба',
                lineTension: 0,
                backgroundColor: color(window.chartColors.yellow).alpha(0.2).rgbString(),

                borderColor: window.chartColors.yellow,
                data: [ <?php echo $qnuari2 + $qnuari2c;?>, <?php echo $fevruari2 + $fevruari2c;?>, <?php echo $mart2 + $mart2c;?>, <?php echo $april2 + $april2c;?>, <?php echo $mai2 + $mai2c;?>, <?php echo $uni2 + $uni2c;?>, <?php echo $uli2 + $uli2c;?>, <?php echo $avgust2 + $avgust2c;?>, <?php echo $septemvri2 + $septemvri2c;?>, <?php echo $oktomvri2 + $oktomvri2c;?>, <?php echo $noemvri2 + $noemvri2c;?>, <?php echo $dekemvri2 + $dekemvri2c;?>]
            }, {
                type: 'bar',
                label: 'Приход',
                backgroundColor: color(window.chartColors.green).alpha(0.2).rgbString(),
                borderColor: window.chartColors.green,
                data: [<?php echo $qnuari2;?>, <?php echo $fevruari2;?>, <?php echo $mart2;?>, <?php echo $april2;?>, <?php echo $mai2;?>, <?php echo $uni2;?>, <?php echo $uli2;?>, <?php echo $avgust2;?>, <?php echo $septemvri2;?>, <?php echo $oktomvri2;?>, <?php echo $noemvri2;?>, <?php echo $dekemvri2;?>]
            }]
        };

        // Define a plugin to provide data labels
        Chart.plugins.register({
            afterDatasetsDraw: function(chartInstance, easing) {
                // To only draw at the end of animation, check for easing === 1
                var ctx = chartInstance.chart.ctx;

                chartInstance.data.datasets.forEach(function (dataset, i) {
                    var meta = chartInstance.getDatasetMeta(i);
                    if (!meta.hidden) {
                        meta.data.forEach(function(element, index) {
                            // Draw the text in black, with the specified font
                            ctx.fillStyle = 'rgb(0, 0, 0)';

                            var fontSize = 16;
                            var fontStyle = 'normal';
                            var fontFamily = 'Helvetica Neue';
                            ctx.font = Chart.helpers.fontString(fontSize, fontStyle, fontFamily);

                            // Just naively convert to string for now
                            var dataString = dataset.data[index].toString();

                            // Make sure alignment settings are correct
                            ctx.textAlign = 'center';
                            ctx.textBaseline = 'middle';

                            var padding = 5;
                            var position = element.tooltipPosition();
                            ctx.fillText(dataString, position.x, position.y - (fontSize / 2) - padding);
                        });
                    }
                });
            }
        });

        function test2() {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {

                    responsive: true,
                }
            });
        };

        window.onload = function(){test1(); test2();}
    </script>

    </div> 
                                </div>
                    </section>
                </div>
</section><!-- /.content -->


                <div class="footer-main">
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
    </body>
</html>
<?php
}
}
?>