<?php
session_start();
include '../connect.php';

$username=$_POST['username'];
$mobilenumber=$_POST['mobilenumber'];
$check_query = mysql_query("select * from userinfo where mobilenumber='$mobilenumber' and username='$username'");


if($row = mysql_fetch_array($check_query)){
	$_SESSION['isLogin'] = $row['name'];
	$_SESSION['number'] = $row['mobilenumber'];
	echo 1;

}else{
	echo 0;
}
