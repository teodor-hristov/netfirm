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
                                <li>
                                    <a href="./index.php">
                                        <i class="fa fa-user"></i> <span>Профил</span>
                                    </a>
                                </li>


                                <li class="active" >
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
                                    Потребителска информация
                                </header>
                                <div class="panel-body">
                                                    
                                
              
                                <form method="post">
                                <ul style="width: 100%" id="lit" class="list-group teammates">
                                    <li class="list-group-item">                                        
                                        <div class="panel-body">
                                            
                                            <?php
                                                    $query = mysql_query("SELECT `amoutofmoney` FROM `users` WHERE `email` = '$email' AND `rank` = '0'");
                                                    $r = implode(" ",mysql_fetch_assoc($query));


                                                if(isset($_POST['save']))
                                                {
                                                    $amoutofmoney = htmlspecialchars($_POST['money']);
                                                    
                                                    if(empty($_POST['money']))
                                                    {
                                                       echo "<br/><br/><h4 style='text-align:center;' class='alert alert-warning'>Грешно въведени данни!</h4>";
                                                    }
                                                    else
                                                    {
                                                       
                                                           mysql_query("UPDATE `users` SET `amoutofmoney` = '$amoutofmoney' WHERE `email` = '$email' AND `rank` = '0'"); 
                                                           echo "<br/><br/><h4 style='text-align:center;' class='alert alert-success'>Успешно въведохте информацията!</h4>";
                                                    }
                                                    
                                                }
                                                else
                                                {

                                                }
                                                ?>
                                               
                                      <div class="form-group">
                                                <label for="exampleInputEmail1">Големина на месечното заплащане</label>
                                                    <input type="number" minlength="4" value="" name="money" class="form-control" placeholder="Въведете сумата" >
                                                </div>

                                                
                                                <button name="save" class="btn btn-success btn-addon btn-lg pull-right">
                                                        <i class="fa fa-check-square-o"> </i> 
                                                        Save
                                                </button>
                                                
                                        </div>
                                    </li>   
                                    <header class="panel-heading" style="width: 100%">
                                         Въведете разход
                                    </header>
                                    <ul style="width: 100%" id="lit" class="list-group teammates">
                                  <li  class="list-group-item">                                        
                                        <div class="panel-body">
                                            <form class="form-inline" method="post" id="form" role="form">
                                                <div class="col-sm-10" class="form-group">
                                                    <div>
                                                        <label >Категория</label> 
                                                    </div>
                                                    <div>
                                                        <select name="type" class="col-sm-3 form-control m-b-12">
                                                            <option value="1">Почивка</option>
                                                            <option value="2">Битови</option>
                                                            <option value="3">Храна</option>
                                                            <option value="4">Образование</option>
                                                            <option value="5">Друго</option>
                                                            
                                                        </select>
                                                    </div>
                                                </div>                                           
                                            
                                        </div>
                                    </li>
                                    <form method="POST">
                                    <li  class="list-group-item">                                        
                                        <div class="panel-body">
                                            
                                                <div class="col-sm-4" class="form-group">
                                                    
                                                    <input type="text" class="form-control" name="desc" id="desc" placeholder="Разход">
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    
                                                    <input type="number" class="form-control" name="value" id="value" placeholder="Стойност">
                                                </div> 
                                                <br />
                                                <br />
                                                <button name="add" onclick="javascript: var form = document.getElementById("form");
                                                form.reset(); " class="btn btn-danger btn-lg pull-right"><i class="fa fa-plus"></i> Добави разход</button> 

                                                 
                                                <?php
                                    if(isset($_POST['add']))
                                    {
                                    
                                    $type = $_POST['type'];
                                    $value = htmlspecialchars($_POST['value']);
                                    $desc = htmlspecialchars($_POST['desc']);
                                    
                                    if(empty($value) || empty($desc))
                                    {
                                        echo "<br/><br/><h4 style='text-align:center;' class='alert alert-warning'>Моля въведете информацията в полетата: Разход и Стойност</h4>";
                                    }
                                    else
                                    {
                                        mysql_query("INSERT INTO `calculator` (`category`, `nameofcost`, `amoutofcost`, `email`, `date`) VALUES('$type', '$desc', '$value', '$email', '$date')");
                                        echo "<br/><br/><h4 style='text-align:center;' class='alert alert-success'>Разходът е добавен успешно!</h4>";
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
                                <header class="panel-heading" style="width: 100%">
                                         Последни 5 въвеждания в отдел разходи
                                </header>
                                <ul style="width: 100%" id="lit" class="list-group teammates">
                                
                                        <?php
                    $email = $_SESSION['user']['email'];
                    $date = gmdate("m"); 
                    $last = mysql_query("SELECT * FROM `calculator` WHERE `email` = '$email' AND `date` = '$date' ORDER BY `id` DESC LIMIT 5");
                    $number = 1;
                    while($last1 = mysql_fetch_assoc($last))
                    {   

                        
                        $newnumber = $number++;
                       $lastprofit = $last1['amoutofcost']; 
                       $lastprofitdesc = $last1['nameofcost'];
                       $lastprofitcategory = $last1['category'];
                       $id = $last1['id'];
                       ?>
                       <li id="<?php echo $id;?>" class="list-group-item">                                        
                                        <div id="<?php echo $id;?>" class="panel-body">
                       <b><?php echo $newnumber;?> | </b><b>Стойност:</b><font color="red"><?php echo $lastprofit?> </font>лева | <b>Разход:</b><?php echo $lastprofitdesc;?> | <b>Категория:</b><?php echo $lastprofitcategory;?><a href="" style="color: red; float: right;" id="<?php echo $id;?>"<a href="" style="color: red; float: right;" id="<?php echo $id;?>" class="fa fa-trash-o delete"></a></div>
                                        </li>
                       <?php
                    }


                    ?>

                                </ul>
    
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
                                    url: './delcost.php',
                                    type: 'post',
                                    data: info,
                                    success: function(){

                                    }
                                });
                                $(this).parent().fadeOut(300, function(){
                                    $(this).remove();
                                    window.location.href = './calc.php';
                                    
                                });
                            };
                            return false;
                        });

                        });
</script>                       
                                

                                     

 
                                    </form>



                                    

                                    
                                    

                    
                    </div><!-- /.panel-body -->
                </div><!-- /.panel -->
           </div>               

                              
                 <!-- ___________________PANEL2_____________________-->   
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel">
                                <header class="panel-heading">
                                    Потребителска информация
                                </header>

                                <div class="panel-body">
                                                
                    

     
                                <ul style="width: 100%" id="lit" class="list-group teammates">
                                    <li class="list-group-item">                                        
                                        <div class="panel-body">
                                        <div style="margin: auto;  width: 90%;">
                                                    <canvas id="myChart" /></canvas>
                                                </div>




                                            <?php
                                             

                                            $var = '';
                                            for ($i = 0; $i <= 5; $i++)
                                            {
                                              $var = 'category' . $i;

                                              // reference $$var_name now.
                                              $$var = implode(" ",mysql_fetch_assoc(mysql_query("SELECT SUM(`amoutofcost`) FROM `calculator` WHERE `email` = '$email' AND `date` = '$date' AND `category` = '$i'"))); ;
                                            }

                                            
                                            
                                            $amoutofmoney = implode(" ", mysql_fetch_assoc(mysql_query("SELECT `amoutofmoney` FROM `users` WHERE `email` = '$email' AND `rank` = '0'")));
                                            $amoutofmoney2 = $amoutofmoney - ($category1 + $category2 + $category3 + $category4 +$category5);
                                                
                                                
                                            

                                            
                                            ?>




                                        <script>
                                        Chart.defaults.doughnutLabels = Chart.helpers.clone(Chart.defaults.doughnut);

var helpers = Chart.helpers;
var defaults = Chart.defaults;

Chart.controllers.doughnutLabels = Chart.controllers.doughnut.extend({
    updateElement: function(arc, index, reset) {
    var _this = this;
    var chart = _this.chart,
        chartArea = chart.chartArea,
        opts = chart.options,
        animationOpts = opts.animation,
        arcOpts = opts.elements.arc,
        centerX = (chartArea.left + chartArea.right) / 2,
        centerY = (chartArea.top + chartArea.bottom) / 2,
        startAngle = opts.rotation, // non reset case handled later
        endAngle = opts.rotation, // non reset case handled later
        dataset = _this.getDataset(),
        circumference = reset && animationOpts.animateRotate ? 0 : arc.hidden ? 0 : _this.calculateCircumference(dataset.data[index]) * (opts.circumference / (2.0 * Math.PI)),
        innerRadius = reset && animationOpts.animateScale ? 0 : _this.innerRadius,
        outerRadius = reset && animationOpts.animateScale ? 0 : _this.outerRadius,
        custom = arc.custom || {},
        valueAtIndexOrDefault = helpers.getValueAtIndexOrDefault;

    helpers.extend(arc, {
      // Utility
      _datasetIndex: _this.index,
      _index: index,

      // Desired view properties
      _model: {
        x: centerX + chart.offsetX,
        y: centerY + chart.offsetY,
        startAngle: startAngle,
        endAngle: endAngle,
        circumference: circumference,
        outerRadius: outerRadius,
        innerRadius: innerRadius,
        label: valueAtIndexOrDefault(dataset.label, index, chart.data.labels[index])
      },

      draw: function () {
        var ctx = this._chart.ctx,
                        vm = this._view,
                        sA = vm.startAngle,
                        eA = vm.endAngle,
                        opts = this._chart.config.options;
                
                    var labelPos = this.tooltipPosition();
                    var segmentLabel = vm.circumference / opts.circumference * 100;
                    
                    ctx.beginPath();
                    
                    ctx.arc(vm.x, vm.y, vm.outerRadius, sA, eA);
                    ctx.arc(vm.x, vm.y, vm.innerRadius, eA, sA, true);
                    
                    ctx.closePath();
                    ctx.strokeStyle = vm.borderColor;
                    ctx.lineWidth = vm.borderWidth;
                    
                    ctx.fillStyle = vm.backgroundColor;
                    
                    ctx.fill();
                    ctx.lineJoin = 'bevel';
                    
                    if (vm.borderWidth) {
                        ctx.stroke();
                    }
                    
                    if (vm.circumference > 0.15) { // Trying to hide label when it doesn't fit in segment
                        ctx.beginPath();
                        ctx.font = helpers.fontString(opts.defaultFontSize, opts.defaultFontStyle, opts.defaultFontFamily);
                        ctx.fillStyle = "#fff";
                        ctx.textBaseline = "top";
                        ctx.textAlign = "center";
            
            // Round percentage in a way that it always adds up to 100%
                        ctx.fillText(segmentLabel.toFixed(0) + "%", labelPos.x, labelPos.y);
                    }
      }
    });

    var model = arc._model;
    model.backgroundColor = custom.backgroundColor ? custom.backgroundColor : valueAtIndexOrDefault(dataset.backgroundColor, index, arcOpts.backgroundColor);
    model.hoverBackgroundColor = custom.hoverBackgroundColor ? custom.hoverBackgroundColor : valueAtIndexOrDefault(dataset.hoverBackgroundColor, index, arcOpts.hoverBackgroundColor);
    model.borderWidth = custom.borderWidth ? custom.borderWidth : valueAtIndexOrDefault(dataset.borderWidth, index, arcOpts.borderWidth);
    model.borderColor = custom.borderColor ? custom.borderColor : valueAtIndexOrDefault(dataset.borderColor, index, arcOpts.borderColor);

    // Set correct angles if not resetting
    if (!reset || !animationOpts.animateRotate) {
      if (index === 0) {
        model.startAngle = opts.rotation;
      } else {
        model.startAngle = _this.getMeta().data[index - 1]._model.endAngle;
      }

      model.endAngle = model.startAngle + model.circumference;
    }

    arc.pivot();
  }
});

var config = {
  type: 'doughnutLabels',
  data: {
    datasets: [{
      data: [
        <?php echo $category1;?>,
        <?php echo $category2;?>,
        <?php echo $category3;?>,
        <?php echo $category4;?>,
        <?php echo $category5;?>,
        <?php echo $amoutofmoney2;?>,
      ],
      backgroundColor: [
        "#F7464A",
        "#46BFBD",
        "#FDB45C",
        "#949FB1",
        "#4D5360",
        "#19e5de",
      ],
      label: 'Dataset 1'
    }],
    labels: [
      "Почивка",
      "Битови",
      "Храна",
      "Образование",
      "Друго",
      "Остатък",
    ]
  },
  options: {
    responsive: true,
    legend: {
      position: 'top',
    },
    title: {
      display: true,
      text: 'Разпределение на заплатата'
    },
    animation: {
      animateScale: true,
      animateRotate: true
    }
  }
};

var ctx = document.getElementById("myChart").getContext("2d");
new Chart(ctx, config);
                                        </script>
                                        </form>
                                </div>
                            </div>
                        </div>                          
                    


               

                <!-- __________________________________PANEL4 - LINECHART___________________________________-->
                </section><!-- /.content -->
                
                    <section class="panel">
                                <header class="panel-heading">
                           
                                 Местоположението Ви
                                </header>

                                        <iframe
                                          style="width: 100%; height: 400px;"
                                          frameborder="0" style="border:0"
                                          src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAfZCFkm4gtjfwvgZaHDgfFx209jMhhEkY
                                            &q=bulgaria, lovech, pmg" allowfullscreen>
                                        </iframe>
                    </section>
                </div>



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
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        
    </body>
</html>
<?php
}

?>