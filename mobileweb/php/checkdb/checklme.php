<?php
include '../connect.php';
$check_db = mysql_query("select * from atk_products where mid='13'");
echo '1';
while($row=mysql_fetch_array($check_db)){
$rowmid =$row['mid'];
$rowpid =$row['pid'];
$check_dbt = mysql_query("select * from atk_spot_prices where mid='$rowmid' and pid ='$rowpid' order by pdate DESC limit 1 ");
	$row2=mysql_fetch_array($check_dbt);


  echo '<tr class="mid'.$row['mid'].'"id="pid'.$row['pid'].'" value="'.$row['pname'].'"><td>'.substr($row2['pdate'],5).'</td><td>'.$row['pname'].'</td><td>'.$row2['pclose'].'</td></tr>';

 };