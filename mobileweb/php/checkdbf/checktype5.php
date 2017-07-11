<?php
include '../connect.php';
$orb =  $_GET['mktid'];
$dqorzl= substr($orb,0,2);
$id = substr($orb,3,2);
switch($dqorzl)
{
	case 'dq':
	$check_db = mysql_query("SELECT * from atk_scrap_product where did='$id'");
	while($row = mysql_fetch_array($check_db))
	{
		echo '<tr id="t5'.$dqorzl.$row['pid'].'"><td>'.$row['pname'].'</td></tr>';
	}

	break;
	case 'zl':
	$check_db = mysql_query("SELECT * from atk_scrap_product where tid='$id'");
	while($row = mysql_fetch_array($check_db))
	{
		echo '<tr id="t5'.$dqorzl.$row['pid'].'"><td>'.$row['pname'].'</td></tr>';
	}

	break;
	default:
	echo '出现未知错误，请刷新页面！';
	break;
}

?>