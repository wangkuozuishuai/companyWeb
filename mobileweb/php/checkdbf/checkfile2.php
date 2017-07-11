<?php
include './config.php';

$filename = $_POST['filename'];
$codename = str_replace(' ', '',$_POST['codename']);
$address = $dbfroot.$filename.'.DBF';

$dbf_conn=dbase_open($address,0);


	for($i=1;$i<=dbase_numrecords($dbf_conn);$i++)
 	{
		$row=dbase_get_record_with_names($dbf_conn,$i); 

		if(trim($row['CODE'])==$codename)	
		{
		echo '<tr><td>最新价格</td><td>'.str_replace(' ', '',$row['NEW']).'</td></tr><tr><td>开盘价</td><td>'.str_replace(' ', '',$row['OPEN']).'</td></tr><tr><td>最高价</td><td>'.str_replace(' ', '',$row['HIGH']).'</td></tr><tr><td>最低价</td><td>'.str_replace(' ', '',$row['LOW']).'</td></tr><tr><td>收盘价</td><td>'.str_replace(' ', '',$row['PRECLOSE']).'</td></tr>';
		}
		else{}	
	 }


?>