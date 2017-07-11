<?php
include '../connect.php';
$pid = substr($_GET['id'],4);

$check_db = mysql_query("SELECT * from atk_scrap_prices where pid='$pid' order by pdate desc");
	while($row = mysql_fetch_array($check_db))
	{
		echo '<tr><td>'.$row['pdate'].'</td><td>'.$row['pheigh'].'</td></tr>';
	}

?>