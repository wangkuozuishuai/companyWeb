<?php
include '../connect.php';
$check_db = mysql_query("select * from atk_products where mid=".$_GET['mid']);

while($row=mysql_fetch_array($check_db)){
$rowmid =$row['mid'];
$rowpid =$row['pid'];
$check_dbt = mysql_query("SELECT * from atk_spot_prices where mid='$rowmid' and pid ='$rowpid' order by pdate DESC limit 1 ");
	$row2=mysql_fetch_array($check_dbt);


  echo '<tr class="mid'.$row2['mid'].'"id="pid'.$row2['pid'].'" value="'.$row['pname'].'"><td>'.substr($row2['pdate'],5).'</td><td>'.$row['pname'].'</td><td>'.$row2['pheigh'].'</td><td>'.$row2['plow'].'</td></tr>';

 };


//str_replace('-','',$row2['pdate'])


//  <?php
// include '../connect.php';
// $mid=$_GET['mid'];
// $check_db = mysql_query("SELECT ap.pdate,am.mname,ap.mid,ap.pid FROM atk_spot_prices ap,atk_markets am where ap.mid='$mid'  and am.mid=ap.mid order by pdate desc LIMIT 0,1 ");
// $row = mysql_fetch_array($check_db);

// $rowmid=$row[2];
// $rowtime=$row[0];
// $rowpid=$row[3];
// $query_rsLastPrices = sprintf("SELECT ap.mid,ap.pid,ap.pdate,ap.popen,ap.pheigh,ap.plow,ap.pclose,ap.tmp_code,pp.pname FROM atk_spot_prices ap,`atk_products` pp where ap.pid=pp.pid and ap.pdate =cast('%s' as date) and ap.mid='$rowmid' order by ap.spid,ap.tmp_code ",$rowtime);
// $rsLastMkt = mysql_query($query_rsLastPrices);
// while($row2=mysql_fetch_array($rsLastMkt))
// {
// 	echo $rowmid;
//  echo '<tr class="mid'.$row2['mid'].'"id="pid'.$row2['pid'].'" value="'.$row2['pname'].'"><td>'.$row2['pname'].'</td><td>'.$row2['pheigh'].'</td><td>'.$row2['plow'].'</td></tr>';
// }