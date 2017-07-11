<?php

include './config.php';
if(empty($_GET['filecodename']))
{
	header("Content-type: text/html; charset=windows-936"); 
$a = $_GET['sid'];
$gla = substr($a,0,3);
$b = $gla.'.DBF';

$dbf_file=$dbfroot.$b;
$dbf_conn=dbase_open($dbf_file,0);


switch($a)
{
	case 'LMEX':
		$textarray = array('LMCDX','LMADX','LMNDX','LMPDX','LMSDX','LMZDX','LMCD0G','LMAD0G','LMND0G','LMPD0G','LMSD0G','LMZD0G','LMAA0G','LMCO0G','LMMO0G');
	break;
	case 'LMEQ':
		$textarray = array('LMCDZ','LMLXCD','LMLXAD','LMADZ','LMLXSD','LMSDZ','LMZDZ','LMNDZ','LMLXND','LMLXZD','LMLXCO','LMPDZ','LMLXPD','LMCOZ','LMAAZ','LMMOZ','LMLXAA','LMLXMO');		
	break;
	case 'LMEG':
		$textarray = array('LMCDG','LMADG','LMNDG','LMPDG','LMSDG','LMZDG','LMCOG','LMAAG','LMMOG');
	break;
	default:
	echo 'NO record';
	break;
}
for($j=0;$j<count($textarray);$j++)
				{
				for($i=1;$i<=dbase_numrecords($dbf_conn);$i++)
				 	{
						$row=dbase_get_record_with_names($dbf_conn,$i); 
							if($textarray[$j]==str_replace(' ','',$row['CODE']))
							{
								if($row['TIME']!=00000000000)
									{
								echo '<tr id="t7'.$gla.$row['CODE'].'"><td colspan="2">'.date('Y-m-d,h:m:s',strtotime($row['TIME'])).'</td><td>'.$row['CODENAME'].'</td><td>'.$row['NEW'].'</td></tr>';

									}
								else{
								echo '<tr id="t7'.$gla.$row['CODE'].'"><td colspan="2">No record</td><td>'.$row['CODENAME'].'</td><td>'.$row['NEW'].'</td></tr>';
									}
							}
					}
				}
}else{
	$filename=$_GET['sid'];
	$filecodename=$_GET['filecodename'];
	$dbf_file=$dbfroot.$filename.'.DBF';
	$dbf_conn=dbase_open($dbf_file,0);

	for($i=1;$i<=dbase_numrecords($dbf_conn);$i++)
				 	{
						$row=dbase_get_record_with_names($dbf_conn,$i); 
							if($filecodename==str_replace(' ','',$row['CODE']))
							{
									echo '<tr><td>最新价格</td><td>'.str_replace(' ', '',$row['NEW']).'</td></tr><tr><td>开盘价</td><td>'.str_replace(' ', '',$row['OPEN']).'</td></tr><tr><td>最高价</td><td>'.str_replace(' ', '',$row['HIGH']).'</td></tr><tr><td>最低价</td><td>'.str_replace(' ', '',$row['LOW']).'</td></tr><tr><td>收盘价</td><td>'.str_replace(' ', '',$row['PRECLOSE']).'</td></tr>';
							}
					}
}