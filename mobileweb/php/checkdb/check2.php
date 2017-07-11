 <?php
include '../connect.php';

$mid = $_GET['mid'];
$pid = $_GET['pid'];

$check_db2 = mysql_query("select * from atk_spot_prices where pid='$pid'and mid ='$mid' order by pdate desc limit 50");

 while($row=mysql_fetch_array($check_db2)){
 	if($mid==13){
 		  echo '<tr><td>'.$row['pdate'].'</td><td>'.$row['pclose'].'</td></tr>';
 	}else{
  echo '<tr><td>'.$row['pdate'].'</td><td>'.$row['pheigh'].'</td><td>'.$row['plow'].'</td></tr>';
	}
  };