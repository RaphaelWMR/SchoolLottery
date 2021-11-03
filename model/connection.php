<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "jpb_db";
$db2 = "lottery";
$conjpb = mysqli_connect($server, $user, $pass, $db);
$conLottery = mysqli_connect($server, $user, $pass, $db2);
mysqli_query($conjpb, "SET NAME 'utf8'");
mysqli_query($conLottery, "SET NAME 'utf8'");
