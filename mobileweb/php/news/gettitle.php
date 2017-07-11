<?php
include '../connect.php';
$decision = $_GET['a'];
switch ($decision) {
	case '1':
		$getnews = mysql_query("select title from(select * from atk_mob_news order by pubdate DESC limit 50) t2 order by RAND() limit 5");
		while($row=mysql_fetch_array($getnews)){	
		echo '<li>'.$row['title'].'</li>';}
		break;
	case '2':
		$gettitle = mysql_query("select * from atk_mob_news order by pubdate desc limit 0,50");
		while($row=mysql_fetch_array($gettitle)){
		echo '<tr id="news'.$row['nid'].'"><td>'.substr($row['pubdate'],2,9).'</td><td>'.$row['title'].'</td></tr>'; }
		break;
	default:
		$getallinfo =mysql_query("select title,content,pubdate from atk_mob_news where nid='$decision'");
		while($row=mysql_fetch_array($getallinfo)){
			
			print_r(json_encode($row));
		}
		break;
}

