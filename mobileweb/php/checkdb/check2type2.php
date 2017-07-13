<?php
include '../connect.php';

$sid = $_GET['sid'];
$pid = $_GET['pid'];
$check_db2 = mysql_query("SELECT * FROM atk_stock_daily where sid='$sid' and pid = '$pid' order by pdate DESC limit 50");

switch($sid){
	case '1':
		while($row=mysql_fetch_array($check_db2)){
		echo '<tr><td>'.$row['pdate'].'</td><td>'.$row['pstock'].'</td><td>'.$row['pstockchange'].'</td></tr>';
		};
	break;
	case '2':
	case '3':
		while($row=mysql_fetch_array($check_db2)){
		echo '<tr><td>'.$row['pdate'].'</td><td>'.$row['pstockamount'].'</td></tr>';
		};
	break;
	case 't3':
		$check_london=mysql_query("SELECT pdate,pauam,paupm,pag from atk_lbma_prices order by pdate desc limit 50");
		while($row=mysql_fetch_array($check_london))
		{
		echo '<tr><td>'.substr($row['pdate'],5).'</td><td>'.$row['pauam'].'</td><td>'.$row['paupm'].'</td><td>'.$row['pag'].'</td></tr>';
		}
	break;
}
