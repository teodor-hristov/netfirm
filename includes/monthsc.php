<?php
    $email = $_SESSION['user']['email'];
    $qnuaric = mysql_query("SELECT SUM(`money`) FROM `cost` WHERE `email` = '$email' AND `month` = '1'");

    $fevruaric = mysql_query("SELECT SUM(`money`) FROM `cost` WHERE `email` = '$email' AND `month` = '2'");

    $martc = mysql_query("SELECT SUM(`money`) FROM `cost` WHERE `email` = '$email' AND `month` = '3'");

    $aprilc = mysql_query("SELECT SUM(`money`) FROM `cost` WHERE `email` = '$email' AND `month` = '4'");

    $maic = mysql_query("SELECT SUM(`money`) FROM `cost` WHERE `email` = '$email' AND `month` = '5'");

    $unic = mysql_query("SELECT SUM(`money`) FROM `cost` WHERE `email` = '$email' AND `month` = '6'");

    $ulic = mysql_query("SELECT SUM(`money`) FROM `cost` WHERE `email` = '$email' AND `month` = '7'");

    $avgustc = mysql_query("SELECT SUM(`money`) FROM `cost` WHERE `email` = '$email' AND `month` = '8'");

    $septemvric = mysql_query("SELECT SUM(`money`) FROM `cost` WHERE `email` = '$email' AND `month` = '9'");

    $oktomvric = mysql_query("SELECT SUM(`money`) FROM `cost` WHERE `email` = '$email' AND `month` = '10'");

    $noemvric = mysql_query("SELECT SUM(`money`) FROM `cost` WHERE `email` = '$email' AND `month` = '11'");

    $dekemvric = mysql_query("SELECT SUM(`money`) FROM `cost` WHERE `email` = '$email' AND `month` = '12'");

    $qnuari1c = mysql_fetch_assoc($qnuaric);
    $qnuari2c = implode(" ", $qnuari1c);

    $fevruari1c = mysql_fetch_assoc($fevruaric);
    $fevruari2c = implode(" ", $fevruari1c);

    $mart1c = mysql_fetch_assoc($martc);
    $mart2c = implode(" ", $mart1c);

    $april1c = mysql_fetch_assoc($aprilc);
    $april2c = implode(" ", $april1c);

    $mai1c = mysql_fetch_assoc($maic);
    $mai2c = implode(" ", $mai1c);

    $uni1c = mysql_fetch_assoc($unic);
    $uni2c = implode(" ", $uni1c);

    $uli1c = mysql_fetch_assoc($ulic);
    $uli2c = implode(" ", $uli1c);

    $avgust1c = mysql_fetch_assoc($avgustc);
    $avgust2c = implode(" ", $avgust1c);

    $septemvri1c = mysql_fetch_assoc($septemvric);
    $septemvri2c = implode(" ", $septemvri1c);

    $oktomvri1c = mysql_fetch_assoc($oktomvric);
    $oktomvri2c = implode(" ", $oktomvri1c);

    $noemvri1c = mysql_fetch_assoc($noemvric);
    $noemvri2c = implode(" ", $noemvri1c);
    
    $dekemvri1c = mysql_fetch_assoc($dekemvric);
    $dekemvri2c = implode(" ", $dekemvri1c);
    
    $finalc = $qnuari2c + $fevruari2c + $mart2c + $april2c + $mai2c + $uni2c + $uli2c + $avgust2c + $septemvri2c + $oktomvri2c + $noemvri2c + $dekemvri2c;
    $qz = mysql_query("SELECT SUM(`dzpo`) FROM `dzpo` WHERE `email` = '$email'");
    $dzpoo = mysql_fetch_assoc($qz);
    $dzpoo2 = implode(" ", $dzpoo);

    $zaplati = mysql_query("SELECT SUM(`brutno`) FROM `dzpo` WHERE `email` = '$email'");
    $zaplati2 = mysql_fetch_assoc($zaplati);
    $zaplati3 = implode(" ", $zaplati2);
?>