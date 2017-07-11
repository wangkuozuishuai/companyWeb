<?php
  session_start();
  header("Content-Type:text/html;charset=utf-8");      
  header("Access-Control-Allow-Origin: *");//设置头部信息
  //isset()检测变量是否设置

  if(isset($_POST['hehe'])){
 
    //strtolower()小写函数
    if(strtolower($_POST['hehe'])== $_SESSION['authcode']){
      //跳转页面
      echo '1';

    }else{
      //提示以及跳转页面
 echo '0';

    }
    exit();
  }