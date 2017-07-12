<?php 
	session_start();
	if(empty($_SESSION['isLogin']))
	{
		    echo "<script type='text/javascript'>if(window.confirm('您还没有登录,请登录')){window.location.href='http://10.7.1.14/mobileweb/signin.html'}else{window.location = document.referrer;}
    </script>";
	};
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">     
<meta content="yes" name="apple-mobile-web-app-capable">     
<meta content="black" name="apple-mobile-web-app-status-bar-style">     
<meta content="telephone=no" name="format-detection">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" >
	<title>有色金属信息查询</title>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/fastclick.js"></script>
<!-- 	<script src="js/jquery.mobile.custom.min.js" type="text/javascript"></script> -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<div id="top">
	<div id="toplist">
		<span class="icon-menu"></span>
	</div>
	<div id="toph1">
		<h1>有色金属信息查询</h1>
	</div>
	<div id="toplogin">
		<span  class="supericon icon-user"></span>
		<span  class="supericon icon-undo2"></span>
	</div>
	</div>
	<div id="topmenu">
		<span class="icon-cross"></span>
		<div id="atklogo"></div>
		<div id="menulist">
			<a href="#metalNews">金属动态</a>
			<a href="#actuals">现货报价</a>
			<a href="#futures">期货报价</a>
			<a href="#tinymetal">小金属报价</a>
			<a href="#awesomemetal">贵金属报价</a>
			<a href="#othermarket">其他市场报价</a>
			<a href="#exchangeinfo">外汇信息</a>
			<a href="#financenumber">金融指数</a>
			<a href="#reporttime">报价时间</a>
			<a href="#introdution">业务介绍</a>
			<a href="#contactus">联系我们</a>
			<div id ="atkpng"></div>
		</div>

	</div>
	<div id="bkg-half"></div>
	<div id="bkg-loding"><span class="three-quarters-loader"></span></div>
	<div id="personinfo">
		<span class="icon-cross"></span>

		<div>
			<p>您好，<?php echo $_SESSION['isLogin']; ?></p>
			<p id="showthename">查看个人信息</p>
			<span class="nonep">用户名:<?php echo $_SESSION['isLogin']; ?></span>
			<span class="nonep">手机号:<?php echo $_SESSION['number'];  ?></span>
			<a href="./php/signinout/signout.php">注销</a>
		</div>
		
	</div>
	<div id="realbody" > 
		<div id="content">

		<div id="metalNews">
			<h1>金属动态</h1>
			<div>
				<ul id="newsul">
					
				</ul>
				<p id="newsp">查看更多</p>
			</div>
		</div>
		<div id="actuals">
			<h1>现货报价</h1>
			<div id= "actualsContent">
				<div><a value="1" href="javascript:void(0)" id="长江现货01"><span>长江现货</span></a></div>
				<div><a value="1" href="javascript:void(0)" id="华通现货03"><span>华通现货</span></a></div>
				<div><a value="1" href="javascript:void(0)" id="广东南储05"><span>广东南储</span></a></div>
				<div><a value="1" href="javascript:void(0)" id="上海行情11"><span>上海行情</span></a></div>
				<div><a value="1" href="javascript:void(0)" id="中铝公司07"><span>中铝</span></a></div>
			</div>
		</div>

		<div id="futures">
			<h1>期货报价</h1>
			<div id= "futuresContent">
				<div><a value="7" href="javascript:void(0)" id="LMEG"><span>LME官方</span></a></div>				
				<div><a value="7" href="javascript:void(0)" id="LMEQ"><span>LME期货</span></a></div>
				<div><a value="7" href="javascript:void(0)" id="LMEX"><span>LME现货</span></a></div>
				<div><a value="2" href="javascript:void(0)" id="LME库存01"><span>LME库存</span></a></div>
				<div><a value="2" href="javascript:void(0)" id="LME成交量02"><span>LME成交量</span></a></div>
				<div><a value="2" href="javascript:void(0)" id="LME未平仓合约03"><span>LME未平仓合约</span></a></div>
				<div><a value="6" href="javascript:void(0)" id="LME最后收盘价13"><span>LME最后收盘价</span></a></div>
				<div><a value="4" href="javascript:void(0)" id="CMX"><span>COMEX</span></a></div>
				<div><a value="4" href="javascript:void(0)" id="SHFEQT" ><span>上海期铜</span></a></div>
				<div><a value="4" href="javascript:void(0)" id="SHFEQL" ><span>上海期铝</span></a></div>
				<div><a value="4" href="javascript:void(0)" id="SHFEQQ" ><span>上海期铅</span></a></div>
				<div><a value="4" href="javascript:void(0)" id="SHFEQX" ><span>上海期锌</span></a></div>
				<div><a value="4" href="javascript:void(0)" id="SHFEQXI" ><span>上海期锡</span></a></div>					
				<div><a value="4" href="javascript:void(0)" id="SHFEQN" ><span>上海期镍</span></a></div>
				<div><a value="4" href="javascript:void(0)" id="SHFEQJ" ><span>上海期金</span></a></div>
				<div><a value="4" href="javascript:void(0)" id="SHFEQY" ><span>上海期银</span></a></div>		
				<div><a value="4" href="javascript:void(0)" id="SHFELG" ><span>上海螺钢</span></a></div>
				<div><a value="4" href="javascript:void(0)" id="SHFERY" ><span>上海燃油</span></a></div>
				<div><a value="4" href="javascript:void(0)" id="SHFEXJ" ><span>上海橡胶</span></a></div>
				<div><a value="4" href="javascript:void(0)" id="SHFERJ" ><span>上海热轧卷</span></a></div>



			</div>
		</div>
		
		<div id="tinymetal">
			<h1>小金属</h1>
			<div id="tmContent">
				<div><a value="1" href="javascript:void(0)" id="欧洲小金属06"><span>欧洲</span></a></div>
				<div><a value="1" href="javascript:void(0)" id="MB小金属12"><span>MB</span></a></div>
			</div>
		</div>
		<div id="awesomemetal">
			<h1>贵金属</h1>
			<div id="amContent">
				<div><a value="4" href="javascript:void(0)" id="MSPM"><span>国际贵金属</span></a></div>
				<div><a value="1" href="javascript:void(0)" id="上海黄金10"><span>上海黄金</span></a></div>
				<div><a value="2" href="javascript:void(0)" id="伦敦定盘价99"><span>伦敦定盘价</span></a></div>
			</div>
		</div>
		<div id="othermarket">
			<h1>其他市场报价</h1>
			<div id="omContent">
				<div><a value="4" href="javascript:void(0)" id="DLCE" ><span>大连交易所</span></a></div>
				<div><a value="4" href="javascript:void(0)" id="CZCE" ><span>郑州交易所</span></a></div>
				<div><a value="4" href="javascript:void(0)" id="NYME" ><span>NYME原油</span></a></div>
			</div>
		</div>
	
		<div id="exchangeinfo">
			<h1>外汇信息</h1>
			<div>
				<div><a value="3" id="MSFXCHF" href="javascript:void(0)"><span>瑞郎</span><span id="ruilang"></span></a></div>
				<div><a value="3" id="MSFXGBP" href="javascript:void(0)"><span>英镑</span><span id="yingbang"></span></a></div>
				<div><a value="3" id="MSFXJPY" href="javascript:void(0)"><span>日元</span><span id="riyuan"></span></a></div>
				<div><a value="3" id="MSFXAUD" href="javascript:void(0)"><span>奥元</span><span id="aoyuan"></span></a></div>
				<div><a value="3" id="MSFXCAD" href="javascript:void(0)"><span>加元</span><span id="jiayuan"></span></a></div>
				<div><a value="3" id="MSFXXEU" href="javascript:void(0)"><span>欧元</span><span id="ouyuan"></span></a></div>
				<div><a value="3" id="MSFXHKD" href="javascript:void(0)"><span>港币</span><span id="gangbi"></span></a></div>
				<div><a value="3" id="MSFXCNY" href="javascript:void(0)"><span>人民币</span><span id="renminbi"></span></a></div>
			</div>
		</div>
		<div id="financenumber">
			<h1>金融指数</h1>
			<div>
				<div><a value="3" id="MSIDUSDX" href="javascript:void(0)"><span>美元指数</span><span id="meizhi"></span></a></div>
				<div><a value="3" id="MSID399106" href="javascript:void(0)"><span>深证指数</span><span id="shenzhi"></span></a></div>
				<div><a value="3" id="MSID000001" href="javascript:void(0)"><span>上证指数</span><span id="shangzhi"></span></a></div>
				<div><a value="3" id="MSIDHSI" href="javascript:void(0)"><span>恒生指数</span><span id="hengzhi"></span></a></div>
				<div><a value="3" id="MSIDDWCF" href="javascript:void(0)"><span>道琼指数</span><span id="daozhi"></span></a></div>
				<div><a value="3" id="MSIDNASDAQ" href="javascript:void(0)"><span>纳斯达克</span><span id="nazhi"></span></a></div>
				<div><a value="3" id="MSIDN225" href="javascript:void(0)"><span>日经指数</span><span id="rizhi"></span></a></div>
				<div><a value="3" id="MSIDFISTI" href="javascript:void(0)"><span>海峡指数</span><span id="haizhi"></span></a></div>
				<div><a value="3" id="MSIDDAX30" href="javascript:void(0)"><span>法兰克福</span><span id="fazhi"></span></a></div>
				<div><a value="3" id="MSIDCAC40" href="javascript:void(0)"><span>巴黎CAC</span><span id="bazhi"></span></a></div>
			</div>
		</div>
		<div id="reporttime">
			<h1>报价时间</h1>
			<p>每天几点。。。周六日休息啥的</p>
		</div>
		<div id="introdution">
			<h1>业务介绍</h1>
			<p>业务介绍啥的</p>
		</div>
		<div id="contactus">
			<h1>联系我们</h1>
			<p>电话：****-****</p>
			<p>邮箱：********@***.com</p>
			<p>地址：*******</p>
		</div>
</div>
	<div id="result" style="display:none">
		<table id="resultul" style="display:none">
			<thead></thead>
			<tbody></tbody>
		</table>	
		<table id="resulttable" style="display:none">
			<thead></thead>
			<tbody></tbody>
		</table>		
	</div>
	<div id="resultnews" style="display:none">
		<div>
			<table id="newstable" style="display:none">
				<thead>
					<tr class="tr">
						<td>时间</td>
						<td>概述</td>
					</tr>
				</thead>
				<tbody id="newstbody">
				</tbody>
			</table>
			<div id="realnews" style="display:none">

				<h1></h1>
				<h4></h4>
				<p></p>

			</div>
		</div>
	</div>
</div>

	<span id="back1" class="back icon-circle-left"></span>
	<span id="back2" class="back icon-circle-left"></span>
	<span id="back3" class="back icon-circle-left"></span>
	<span id="back4" class="back icon-circle-left"></span>
	<span id="backtoTop" class="icon-circle-up"></span>


</body>
</html>