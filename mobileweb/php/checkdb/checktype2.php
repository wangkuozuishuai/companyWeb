<?php
include '../connect.php';
$sid=$_GET['sid'];
$check_db = mysql_query("select * from atk_stocks_product where sid = '$sid'");
switch ($sid) 
	{
		case '01':
			while($row=mysql_fetch_array($check_db))
			{
				$rowpid = $row['pid'];
				$check_dbt = mysql_query("select * from atk_stock_daily where sid = '$sid' and pid='$rowpid' order by pdate DESC limit 1");
				while($row2=mysql_fetch_array($check_dbt))
				{
				echo '<tr class="mid'.$row['sid'].'" id="t1pid'.$row['pid'].'" value="'.$row['pname'].'"><td>'.substr($row2['pdate'],5).'</td><td>'.$row['pname'].'</td><td>'.$row2['pstock'].'</td><td>'.$row2['pstockchange'].'</td></tr>';
				}
			}
			break;
		case '02':
		case '03':
			while($row=mysql_fetch_array($check_db))
			{
				$rowpid = $row['pid'];
				$check_dbt = mysql_query("select * from atk_stock_daily where sid = '$sid' and pid='$rowpid' order by pdate DESC limit 1");
				while($row2=mysql_fetch_array($check_dbt))
				{
				echo '<tr class="mid'.$row['sid'].'" id="t2pid'.$row['pid'].'" value="'.$row['pname'].'"><td>'.substr($row2['pdate'],5).'</td><td>'.$row['pname'].'</td><td>'.$row2['pstockamount'].'</td></tr>';
				}
			}
			break;

		case '99'://贵金属栏目 伦敦定盘价专用！
			$check_london = mysql_query("SELECT pdate,pauam,paupm,pag from atk_lbma_prices order by pdate desc limit 1");
			while($row=mysql_fetch_array($check_london))
			{
				echo '<tr id="t3'.$row['pauam'].'"><td>'.substr($row['pdate'],5).'</td><td>金(上午)</td><td>'.$row['pauam'].'</td></tr><tr id="t3'.$row['paupm'].'"><td>'.substr($row['pdate'],5).'</td><td>金(下午)</td><td>'.$row['paupm'].'</td></tr><tr id="t3'.$row['pag'].'"><td>'.substr($row['pdate'],5).'</td><td>银</td><td>'.$row['pag'].'</td></tr>';
			}
			break;


		default:
			echo '出现错误，请重新登录';
			break;
	};

