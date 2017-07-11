<?php
header("Content-type: text/html; charset=windows-936"); 
include './config.php';
$a = $_GET['sid'];
$gla = substr($a,0,4);
$b = $gla.'.DBF';

$dbf_file=$dbfroot.$b;
$dbf_conn=dbase_open($dbf_file,0);


switch($a)
{
	case 'MSPM':
		for($i=1;$i<=dbase_numrecords($dbf_conn);$i++)
	 	{
			$row=dbase_get_record_with_names($dbf_conn,$i); 
					if($row['TIME']!=00000000000)
					{
					echo '<tr id="t4'.$gla.$row['CODE'].'"><td colspan="2">'.date('Y-m-d,h:m:s',strtotime($row['TIME'])).'</td><td>'.$row['CODENAME'].'</td><td>'.$row['NEW'].'</td></tr>';
					continue;
					}
					else{
					echo '<tr id="t4'.$gla.$row['CODE'].'"><td colspan="2">No record</td><td>'.$row['CODENAME'].'</td><td>'.$row['NEW'].'</td></tr>';
					}
		}
	break;
	case 'SHFERY':
		for($i=1;$i<=dbase_numrecords($dbf_conn);$i++)
	 	{
	 					$row=dbase_get_record_with_names($dbf_conn,$i); 
				if(preg_match("/^FU/", $row['CODE']))	
				{			
					if($row['TIME']!=00000000000)
					{
					echo '<tr id="t4'.$gla.$row['CODE'].'"><td colspan="2">'.date('Y-m-d,h:m:s',strtotime($row['TIME'])).'</td><td>'.$row['CODENAME'].'</td><td>'.$row['NEW'].'</td></tr>';
					continue;
					}
					else{
					echo '<tr id="t4'.$gla.$row['CODE'].'"><td colspan="2">No record</td><td>'.$row['CODENAME'].'</td><td>'.$row['NEW'].'</td></tr>';
					}
				}
				else{}	
		}
	break;
	case 'SHFEXJ':
		for($i=1;$i<=dbase_numrecords($dbf_conn);$i++)
	 	{
			$row=dbase_get_record_with_names($dbf_conn,$i); 

				if(preg_match("/^RU/", $row['CODE']))	
				{			
					if($row['TIME']!=00000000000)
					{
					echo '<tr id="t4'.$gla.$row['CODE'].'"><td colspan="2">'.date('Y-m-d,h:m:s',strtotime($row['TIME'])).'</td><td>'.$row['CODENAME'].'</td><td>'.$row['NEW'].'</td></tr>';
					continue;
					}
					else{
					echo '<tr id="t4'.$gla.$row['CODE'].'"><td colspan="2">No record</td><td>'.$row['CODENAME'].'</td><td>'.$row['NEW'].'</td></tr>';
					}
				}
				else{}	
		}
	break;
	case 'DLCE':
		for($i=1;$i<=dbase_numrecords($dbf_conn);$i++)
	 	{
			$row=dbase_get_record_with_names($dbf_conn,$i); 

				if(preg_match("/(^A\d{4,})|(^SB)|(^BE)|(^M\d{4,})|(^BD)|(^B\d{4,})/", $row['CODE']))	
				{			
					if($row['TIME']!=00000000000)
					{
					echo '<tr id="t4'.$gla.$row['CODE'].'"><td colspan="2">'.date('Y-m-d,h:m:s',strtotime($row['TIME'])).'</td><td>'.$row['CODENAME'].'</td><td>'.$row['NEW'].'</td></tr>';
					continue;
					}
					else{
					echo '<tr id="t4'.$gla.$row['CODE'].'"><td colspan="2">No record</td><td>'.$row['CODENAME'].'</td><td>'.$row['NEW'].'</td></tr>';
					}
				}
				else{}	
		}
	break;
	case 'CZCE':
		for($i=1;$i<=dbase_numrecords($dbf_conn);$i++)
	 	{
			$row=dbase_get_record_with_names($dbf_conn,$i); 

				if(preg_match("/(^W(H|S))|(^CF)|(^SR)/", $row['CODE']))	
				{			
					if($row['TIME']!=00000000000)
					{
					echo '<tr id="t4'.$gla.$row['CODE'].'"><td colspan="2">'.date('Y-m-d,h:m:s',strtotime($row['TIME'])).'</td><td>'.$row['CODENAME'].'</td><td>'.$row['NEW'].'</td></tr>';
					continue;
					}
					else{
					echo '<tr id="t4'.$gla.$row['CODE'].'"><td colspan="2">No record</td><td>'.$row['CODENAME'].'</td><td>'.$row['NEW'].'</td></tr>';
					}
				}
				else{}	
		}
	break;
	case 'NYME':
		for($i=1;$i<=dbase_numrecords($dbf_conn);$i++)
	 	{
			$row=dbase_get_record_with_names($dbf_conn,$i); 

				if(preg_match("/^CON/", $row['CODE']))	
				{			
					if($row['TIME']!=00000000000)
					{
					echo '<tr id="t4'.$gla.$row['CODE'].'"><td colspan="2">'.date('Y-m-d,h:m:s',strtotime($row['TIME'])).'</td><td>'.$row['CODENAME'].'</td><td>'.$row['NEW'].'</td></tr>';
					continue;
					}
					else{
					echo '<tr id="t4'.$gla.$row['CODE'].'"><td colspan="2">No record</td><td>'.$row['CODENAME'].'</td><td>'.$row['NEW'].'</td></tr>';
					}
				}
				else{}	
		}
	break;
	case 'CMX':
		for($i=1;$i<=dbase_numrecords($dbf_conn);$i++)
	 	{
			$row=dbase_get_record_with_names($dbf_conn,$i); 
								if($row['TIME']!=00000000000)
					{
					echo '<tr id="t6'.$gla.$row['CODE'].'"><td colspan="2">'.date('Y-m-d,h:m:s',strtotime($row['TIME'])).'</td><td>'.$row['CODENAME'].'</td><td>'.$row['NEW'].'</td></tr>';
					continue;
					}
					else{
					echo '<tr id="t6'.$gla.$row['CODE'].'"><td colspan="2"></td>No record<td>'.$row['CODENAME'].'</td><td>'.$row['NEW'].'</td></tr>';
					}
		}
	break;
	case 'SHFEQT':
		for($i=1;$i<=dbase_numrecords($dbf_conn);$i++)
		 	{
				$row=dbase_get_record_with_names($dbf_conn,$i); 

				if(preg_match("/(^CO)|(^CU)/", $row['CODE']))	
				{			
					if($row['TIME']!=00000000000)
					{
					echo '<tr id="t4'.$gla.$row['CODE'].'"><td colspan="2">'.date('Y-m-d,h:m:s',strtotime($row['TIME'])).'</td><td>'.$row['CODENAME'].'</td><td>'.$row['NEW'].'</td></tr>';
					continue;
					}
					else{
					echo '<tr id="t4'.$gla.$row['CODE'].'"><td colspan="2">No record</td><td>'.$row['CODENAME'].'</td><td>'.$row['NEW'].'</td></tr>';
					}
				}
				else{}	
			}
	break;
	case 'SHFEQL':
		for($i=1;$i<=dbase_numrecords($dbf_conn);$i++)
		 	{
				$row=dbase_get_record_with_names($dbf_conn,$i); 

				if(preg_match("/^AL/", $row['CODE']))	
				{			
					if($row['TIME']!=00000000000)
					{
					echo '<tr id="t4'.$gla.$row['CODE'].'"><td colspan="2">'.date('Y-m-d,h:m:s',strtotime($row['TIME'])).'</td><td>'.$row['CODENAME'].'</td><td>'.$row['NEW'].'</td></tr>';
					continue;
					}
					else{
					echo '<tr id="t4'.$gla.$row['CODE'].'"><td colspan="2">No record</td><td>'.$row['CODENAME'].'</td><td>'.$row['NEW'].'</td></tr>';
					}
				}
				else{}	
			}
	break;
	case 'SHFEQX':
		for($i=1;$i<=dbase_numrecords($dbf_conn);$i++)
		 	{
				$row=dbase_get_record_with_names($dbf_conn,$i); 

				if(preg_match("/^ZN/", $row['CODE']))	
				{			
					if($row['TIME']!=00000000000)
					{
					echo '<tr id="t4'.$gla.$row['CODE'].'"><td colspan="2">'.date('Y-m-d,h:m:s',strtotime($row['TIME'])).'</td><td>'.$row['CODENAME'].'</td><td>'.$row['NEW'].'</td></tr>';
					continue;
					}
					else{
					echo '<tr id="t4'.$gla.$row['CODE'].'"><td colspan="2">No record</td><td>'.$row['CODENAME'].'</td><td>'.$row['NEW'].'</td></tr>';
					}
				}
				else{}	
			}
	break;
	case 'SHFEQJ':
		for($i=1;$i<=dbase_numrecords($dbf_conn);$i++)
		 	{
				$row=dbase_get_record_with_names($dbf_conn,$i); 

				if(preg_match("/^AU/", $row['CODE']))	
				{			
					if($row['TIME']!=00000000000)
					{
					echo '<tr id="t4'.$gla.$row['CODE'].'"><td colspan="2">'.date('Y-m-d,h:m:s',strtotime($row['TIME'])).'</td><td>'.$row['CODENAME'].'</td><td>'.$row['NEW'].'</td></tr>';
					continue;
					}
					else{
					echo '<tr id="t4'.$gla.$row['CODE'].'"><td colspan="2">No record</td><td>'.$row['CODENAME'].'</td><td>'.$row['NEW'].'</td></tr>';
					}
				}
				else{}	
			}
	break;
	case 'SHFELG':
		for($i=1;$i<=dbase_numrecords($dbf_conn);$i++)
		 	{
				$row=dbase_get_record_with_names($dbf_conn,$i); 

				if(preg_match("/^RB/", $row['CODE']))	
				{			
					if($row['TIME']!=00000000000)
					{
					echo '<tr id="t4'.$gla.$row['CODE'].'"><td colspan="2">'.date('Y-m-d,h:m:s',strtotime($row['TIME'])).'</td><td>'.$row['CODENAME'].'</td><td>'.$row['NEW'].'</td></tr>';
					continue;
					}
					else{
					echo '<tr id="t4'.$gla.$row['CODE'].'"><td colspan="2">No record</td><td>'.$row['CODENAME'].'</td><td>'.$row['NEW'].'</td></tr>';
					}
				}
				else{}	
			}
	break;
	case 'SHFEXC':
		for($i=1;$i<=dbase_numrecords($dbf_conn);$i++)
		 	{
				$row=dbase_get_record_with_names($dbf_conn,$i); 

				if(preg_match("/^WR/", $row['CODE']))	
				{			
					if($row['TIME']!=00000000000)
					{
					echo '<tr id="t4'.$gla.$row['CODE'].'"><td colspan="2">'.date('Y-m-d,h:m:s',strtotime($row['TIME'])).'</td><td>'.$row['CODENAME'].'</td><td>'.$row['NEW'].'</td></tr>';
					continue;
					}
					else{
					echo '<tr id="t4'.$gla.$row['CODE'].'"><td colspan="2">No record</td><td>'.$row['CODENAME'].'</td><td>'.$row['NEW'].'</td></tr>';
					}
				}
				else{}	
			}
	break;
	case 'SHFEQY':
		for($i=1;$i<=dbase_numrecords($dbf_conn);$i++)
		 	{
				$row=dbase_get_record_with_names($dbf_conn,$i); 

				if(preg_match("/^AG/", $row['CODE']))	
				{			
					if($row['TIME']!=00000000000)
					{
					echo '<tr id="t4'.$gla.$row['CODE'].'"><td colspan="2">'.date('Y-m-d,h:m:s',strtotime($row['TIME'])).'</td><td>'.$row['CODENAME'].'</td><td>'.$row['NEW'].'</td></tr>';
					continue;
					}
					else{
					echo '<tr id="t4'.$gla.$row['CODE'].'"><td colspan="2">No record</td><td>'.$row['CODENAME'].'</td><td>'.$row['NEW'].'</td></tr>';
					}
				}
				else{}	
			}
	break;
	case 'SHFEQQ':
		for($i=1;$i<=dbase_numrecords($dbf_conn);$i++)
		 	{
				$row=dbase_get_record_with_names($dbf_conn,$i); 

				if(preg_match("/^PB/", $row['CODE']))	
				{			
					if($row['TIME']!=00000000000)
					{
					echo '<tr id="t4'.$gla.$row['CODE'].'"><td colspan="2">'.date('Y-m-d,h:m:s',strtotime($row['TIME'])).'</td><td>'.$row['CODENAME'].'</td><td>'.$row['NEW'].'</td></tr>';
					continue;
					}
					else{
					echo '<tr id="t4'.$gla.$row['CODE'].'"><td colspan="2">No record</td><td>'.$row['CODENAME'].'</td><td>'.$row['NEW'].'</td></tr>';
					}
				}
				else{}	
			}
	break;
	case 'SHFEQN':
		for($i=1;$i<=dbase_numrecords($dbf_conn);$i++)
		 	{
				$row=dbase_get_record_with_names($dbf_conn,$i); 

				if(preg_match("/^NI/", $row['CODE']))	
				{			
					if($row['TIME']!=00000000000)
					{
					echo '<tr id="t4'.$gla.$row['CODE'].'"><td colspan="2">'.date('Y-m-d,h:m:s',strtotime($row['TIME'])).'</td><td>'.$row['CODENAME'].'</td><td>'.$row['NEW'].'</td></tr>';
					continue;
					}
					else{
					echo '<tr id="t4'.$gla.$row['CODE'].'"><td colspan="2">No record</td><td>'.$row['CODENAME'].'</td><td>'.$row['NEW'].'</td></tr>';
					}
				}
				else{}	
			}
	break;
	case 'SHFEQXI':
		for($i=1;$i<=dbase_numrecords($dbf_conn);$i++)
		 	{
				$row=dbase_get_record_with_names($dbf_conn,$i); 

				if(preg_match("/^SN/", $row['CODE']))	
				{			
					if($row['TIME']!=00000000000)
					{
					echo '<tr id="t4'.$gla.$row['CODE'].'"><td colspan="2">'.date('Y-m-d,h:m:s',strtotime($row['TIME'])).'</td><td>'.$row['CODENAME'].'</td><td>'.$row['NEW'].'</td></tr>';
					continue;
					}
					else{
					echo '<tr id="t4'.$gla.$row['CODE'].'"><td colspan="2">No record</td><td>'.$row['CODENAME'].'</td><td>'.$row['NEW'].'</td></tr>';
					}
				}
				else{}	
			}
	break;
	default:
	echo '数据错误';
	break;
}





 ?>