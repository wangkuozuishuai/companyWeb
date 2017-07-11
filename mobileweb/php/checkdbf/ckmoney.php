<?php
	
include './config.php';
$a = $_GET['sid'];
$mykind=substr($a,4);
$filename=substr($a,0,4).'.DBF';
echo $mykind;
echo $filename;


 $dbf_file=$dbfroot.$filename;
$dbf_conn=dbase_open($dbf_file,0);


 for($i=1;$i<=dbase_numrecords($dbf_conn);$i++)
 	{
		$row=dbase_get_record_with_names($dbf_conn,$i); 

		if(trim($row['CODE'])==$mykind)	
		{
		
			echo '<tr><td>时间</td><td colspan="2">'.date('Y-m-d,h:m:s',strtotime($row['TIME'])).'</td></tr><tr><td>最新</td><td colspan="2">'.$row['NEW'].'</td></tr><tr><td>最高</td><td colspan="2">'.$row['HIGH'].'</td></tr><tr><td>最低</td><td colspan="2">'.$row['LOW'].'</td></tr><tr><td>开盘</td><td colspan="2">'.$row['OPEN'].'</td></tr><tr><td>收盘</td><td colspan="2">'.$row['PRECLOSE'].'</td></tr>';
		}
		else{}	
	 }
?>