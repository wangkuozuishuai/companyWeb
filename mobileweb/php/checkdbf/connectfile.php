<?php
include './config.php';
$address = $_GET['address'].'.DBF';

$dbf_file=$dbfroot.$address;

$moneyB=array('CHF','GBP','JPY','AUD','CAD','XEU','HKD','CNY');
$resultB=array();

$dbf_conn=dbase_open($dbf_file,0);
   //返回的是一个关联数组
for($j=0;$j<count($moneyB);$j++)
{
 for($i=1;$i<=dbase_numrecords($dbf_conn);$i++)
 	{
		$row=dbase_get_record_with_names($dbf_conn,$i); 

		if(trim($row['CODE'])==$moneyB[$j])	
		{
		
			array_push($resultB,trim($row['NEW']));
		}
		else{}	
	 }
}

echo json_encode($resultB);


  ?>
