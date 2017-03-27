<?php
session_start();
ob_start();
include "../../includes/config.php";
include "../../includes/func.php";
if($_SESSION['is-logged'] == false || $_SESSION['user']['rank'] == 0)
{
    header("Location: ../../index.php");
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
                                <li class="active" >
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
                                    Потребителска информация
                                </header>
                                <div class="panel-body">
                                                    
                                <?php
                                $email = $_SESSION['user']['email'];
                                $FrirmInformationQuery = mysql_query("SELECT * FROM `firm` WHERE `email` = '$email'");
                                $FrimInformationAssoc = mysql_fetch_assoc($FrirmInformationQuery);
                                $_SESSION['firm'] = $FrimInformationAssoc;
                                ?>
              
                                <form method="post">
                                <ul style="width: 100%" id="lit" class="list-group teammates">
                                    <li class="list-group-item">                                        
                                        <div class="panel-body">
                                            
                                            
                                               <div class="form-group">
                                                <label for="exampleInputEmail1">Директор на фирмата</label>
                                                    <input type="text" minlength="4" value="<?php echo $_SESSION['firm']['owner'];?>" name="owner" class="form-control"  >
                                                </div>

                                                <div class="form-group">
                                                <label for="exampleInputEmail1">Име на фирмата</label>
                                                    <input type="text" minlength="4" value="<?php echo $_SESSION['firm']['firmname'];?>" name="firmname" class="form-control"  >
                                                </div>

                                                <div class="form-group">
                                                <label for="exampleInputEmail1">Вид на фирмата</label>
                                                    <input disabled="disabled" type="text" minlength="4" value="<?php echo $_SESSION['firm']['type'];?>" class="form-control"  >
                                                </div>
                                    <div class="form-group">
                                          <label>Вид на данъка</label>
                                          
                                              <select class="form-control m-b-10" name="typeoftax">
                                                  <option value="ОСНО">ОСНО</option>
                                                  <option value="ЕНВД">ЕНВД</option>
                                                  <option value="УСН">УСН</option>
                                              </select>
                                          
                                      </div>

                                      <div class="form-group">
                                                <label for="exampleInputEmail1">Персонал</label>
                                                    <input type="text" minlength="4" value="<?php echo $_SESSION['firm']['employees'];?>" name="employees" class="form-control"  >
                                                </div>

                                                <div class="form-group">
                                                <label for="exampleInputEmail1">Имейл адрес</label>
                                                    <input type="text" minlength="4" value="<?php echo $_SESSION['firm']['email'];?>" name="email" class="form-control"  >
                                                </div>

                                                <div class="form-group">
                                                <label for="exampleInputEmail1">Телефонен номер</label>
                                                    <input type="text" minlength="4" value="<?php echo $_SESSION['firm']['phone'];?>" name="phonenumber" class="form-control"  >
                                                </div>

                                                <div class="form-group">
                                                <label for="exampleInputEmail1">Адрес</label>
                                                    <input type="text" minlength="4" value="<?php echo $_SESSION['firm']['adress'];?>" name="adress" class="form-control"  >
                                                </div>

                                                <div class="form-group">
                                                <label for="exampleInputEmail1">Град</label>
                                                    <input type="text" minlength="4" value="<?php echo $_SESSION['firm']['city'];?>" name="city" class="form-control"  >
                                                </div>

                                                <div class="form-group">
                                                <label for="exampleInputEmail1">Парола</label>
                                                    <input type="text" minlength="4" value="<?php echo $_SESSION['user']['password'];?>" name="pass" class="form-control"  >
                                                </div>



                                            
                                        </div>
                                    </li>                              
                                </ul>

                                
                                        
                                    

                                     <button name="save" class="btn btn-success btn-addon btn-md pull-right">
                                        <i class="fa fa-check-square-o"> </i> 
                                        Save
                                    </button>
 
                                    </form>


                                    <?php
                                    if(isset($_POST['save']))
                                    {
                                    $owner = htmlspecialchars($_POST['owner']);
                                    $firmname = htmlspecialchars($_POST['firmname']);
                                    $typeoftax = htmlspecialchars($_POST['typeoftax']);
                                    $email = htmlspecialchars($_POST['email']);
                                    $phone = htmlspecialchars($_POST['phonenumber']);
                                    $adress = htmlspecialchars($_POST['adress']);
                                    $city = htmlspecialchars($_POST['city']);
                                    $password = htmlspecialchars($_POST['pass']);
                                    $employees = htmlspecialchars($_POST['employees']);

                                    mysql_query("UPDATE `firm` SET `firmname` = '$firmname', `adress` = '$adress', `city` = '$city', `owner` = '$owner', `phone` = '$phone', `email` = '$email', `employees` = '$employees', `typeoftax` = '$typeoftax'  ");
                                    mysql_query("UPDATE `users` SET `email` = '$email', `password` = '$password'");

                                    echo "<script>alert('За да завършите процеса с промяната на данните, моля излезте от профила си и влезте отново!');</script>";                                    
                                    }
                                    else
                                    {

                                    }

                                    ?>

                                    
                                    

                    
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
                                            
                                        <img style="width: 650px; height: auto; " src="<?php avatar();?>">
                                        </div>
                                        <form action="avatar.php" method="post" enctype="multipart/form-data">
                                            <input type="file" name="image" class="btn btn-success btn-addon btn-md" id="fileToUpload">
                                            <br />
                                            <input type="submit" value="Upload Image" class="btn btn-success btn-addon btn-md" name="submit">
                                        </form>
                                </div>
                            </div>
                        </div>                          
                    


                <!-- __________________________________PANEL3___________________________________-->
                                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel">
                                <header class="panel-heading">
                                    Потвърждаване на личността <span class="label label-success"><i class="fa fa-check-square"> </i></span>
                                </header>

                                <div class="panel-body">
                                                
                    
              
     
                                <ul style="width: 100%" id="lit" class="list-group teammates">
                                    <li class="list-group-item">                                        
                                        <div class="panel-body">
                                            
                                        <img style="width: 350px; height: auto; " src="./img/passport.png">
                                        </div>
                                        <button style="margin-top: 5%;" name="uploadphoto" class="btn btn-success btn-addon btn-md pull-left">
                                        <i class="fa fa-upload"> </i> 
                                        Upload passport
                                    </button>
                                </div>
                            </div>
                        </div>                          
                    </div> <!-- row end -->


                <!-- __________________________________PANEL4 - LINECHART___________________________________-->
                </section><!-- /.content -->
                
                    <section class="panel">
                                <header class="panel-heading">
                           
                                 Местоположение на фирмата
                                </header>
                                        <iframe
                                          style="width: 100%; height: 400px;"
                                          frameborder="0" style="border:0"
                                          src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAfZCFkm4gtjfwvgZaHDgfFx209jMhhEkY
                                            &q=<?php echo $_SESSION['firm']['adress'];?>" allowfullscreen>
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
        <script type="text/javascript">
                        var addressesArray = [
            'bulgaria, lovech',
            //follow this structure
            ] 
              //loop all the addresses and call a marker for each one
              for (var x = 0; x < addressesArray.length; x++) {
                $.getJSON('http://maps.googleapis.com/maps/api/geocode/json?address='+addressesArray[x]+'&sensor=false', null, function (data) {
                    var p = data.results[0].geometry.location
                    var latlng = new google.maps.LatLng(p.lat, p.lng);
                    var aMarker= new google.maps.Marker({
                        position: latlng, //it will place marker based on the addresses, which they will be translated as geolocations. 
                        map: map 

                    });

            }
        </script>

    </body>
</html>
<?php
}
}
?>