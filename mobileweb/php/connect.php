<?php
header("Access-Control-Allow-Origin: *");
$con=mysql_connect("localhost","root","");

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  };
mysql_select_db("metalinfo", $con);
mysql_query("set names 'utf8'");