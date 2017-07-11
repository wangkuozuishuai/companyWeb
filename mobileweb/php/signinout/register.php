<?php

include '../connect.php';

$username=$_POST['username'];
$name= $_POST['name'];
$mobilenumber=$_POST['mobilenumber'];
if(empty($username)||empty($name)||empty($mobilenumber))
{
	echo '2';
	exit;
}

$check_query = mysql_query("select * from userinfo where mobilenumber='$mobilenumber' limit 1");


if(mysql_fetch_array($check_query)){
    echo '0';
    exit;
}else{
	mysql_query("INSERT INTO userinfo (username, name, mobilenumber) VALUES ('$username', '$name', '$mobilenumber')");
	echo '1';

}