<?php
    $email = $_SESSION['user']['email'];
    $qnuari = mysql_query("SELECT SUM(`money`) FROM `profit` WHERE `email` = '$email' AND `month` = '1'");

    $fevruari = mysql_query("SELECT SUM(`money`) FROM `profit` WHERE `email` = '$email' AND `month` = '2'");

    $mart = mysql_query("SELECT SUM(`money`) FROM `profit` WHERE `email` = '$email' AND `month` = '3'");

    $april = mysql_query("SELECT SUM(`money`) FROM `profit` WHERE `email` = '$email' AND `month` = '4'");

    $mai = mysql_query("SELECT SUM(`money`) FROM `profit` WHERE `email` = '$email' AND `month` = '5'");

    $uni = mysql_query("SELECT SUM(`money`) FROM `profit` WHERE `email` = '$email' AND `month` = '6'");

    $uli = mysql_query("SELECT SUM(`money`) FROM `profit` WHERE `email` = '$email' AND `month` = '7'");

    $avgust = mysql_query("SELECT SUM(`money`) FROM `profit` WHERE `email` = '$email' AND `month` = '8'");

    $septemvri = mysql_query("SELECT SUM(`money`) FROM `profit` WHERE `email` = '$email' AND `month` = '9'");

    $oktomvri = mysql_query("SELECT SUM(`money`) FROM `profit` WHERE `email` = '$email' AND `month` = '10'");

    $noemvri = mysql_query("SELECT SUM(`money`) FROM `profit` WHERE `email` = '$email' AND `month` = '11'");

    $dekemvri = mysql_query("SELECT SUM(`money`) FROM `profit` WHERE `email` = '$email' AND `month` = '12'");

    $qnuari1 = mysql_fetch_assoc($qnuari);
    $qnuari2 = implode(" ", $qnuari1);

    $fevruari1 = mysql_fetch_assoc($fevruari);
    $fevruari2 = implode(" ", $fevruari1);

    $mart1 = mysql_fetch_assoc($mart);
    $mart2 = implode(" ", $mart1);

    $april1 = mysql_fetch_assoc($april);
    $april2 = implode(" ", $april1);

    $mai1 = mysql_fetch_assoc($mai);
    $mai2 = implode(" ", $mai1);

    $uni1 = mysql_fetch_assoc($uni);
    $uni2 = implode(" ", $uni1);

    $uli1 = mysql_fetch_assoc($uli);
    $uli2 = implode(" ", $uli1);

    $avgust1 = mysql_fetch_assoc($avgust);
    $avgust2 = implode(" ", $avgust1);

    $septemvri1 = mysql_fetch_assoc($septemvri);
    $septemvri2 = implode(" ", $septemvri1);

    $oktomvri1 = mysql_fetch_assoc($oktomvri);
    $oktomvri2 = implode(" ", $oktomvri1);

    $noemvri1 = mysql_fetch_assoc($noemvri);
    $noemvri2 = implode(" ", $noemvri1);
    
    $dekemvri1 = mysql_fetch_assoc($dekemvri);
    $dekemvri2 = implode(" ", $dekemvri1);
    $final = $qnuari2 + $fevruari2 + $mart2 + $april2 + $mai2 + $uni2 + $uli2 + $avgust2 + $septemvri2 + $oktomvri2 + $noemvri2 + $dekemvri2;
?>