<?php
//echo"a";
//$db_con = mysqli_connect("localhost", "root", "", "data");
//$db_con = mysqli_connect("App-db-03.gce.memeglobal.tech", "app", "XxWDSbDh55Dk");
//$db_con = mysqli_connect("localhost", "tal", "Talnitz1", "data");
//$db_con = mysqli_connect("104.154.151.35", "tal", "Talnitz1", "data");
//$db_con = mysql_connect("localhost", "root","");
//var_dump($db_con);
//phpinfo(); exit();

$instance_name = ":/cloudsql/instance-1:data";
$c = new mysqli(null, "tal", "Talnitz1", "data", 0, $instance_name);
//$c = new mysqli("104.154.151.35", "root", "", "data", null, $instance_name);
//$c = new mysqli("104.154.151.35", "tal", "Talnitz1", "data", null, $instance_name);
//
var_dump($c);