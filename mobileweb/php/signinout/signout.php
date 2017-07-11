<?php
	session_start();
	unset($_SESSION['isLogin']);
	header('Location:http://10.7.1.14/mobileweb/signin.html');
?>