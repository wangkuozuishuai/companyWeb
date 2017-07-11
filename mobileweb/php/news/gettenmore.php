<?php
include '../connect.php';

$number=$_POST['number'];
$gettitle = mysql_query("SELECT * from atk_mob_news order by pubdate desc limit $number,20");
	while($row=mysql_fetch_array($gettitle))
	{
		echo '<tr id="news'.$row['nid'].'"><td>'.substr($row['pubdate'],2,9).'</td><td>'.$row['title'].'</td></tr>';
	};
	