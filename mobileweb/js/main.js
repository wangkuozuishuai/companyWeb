// type = 1 常规类型从market 和 spot price里查询的数据
// type = 2 从stock里查询 包括LME库存、成交量、未平仓
// type = 3 

$(window).load(function (){
	if(!!window.ActiveXObject || "ActiveXObject" in window)
	{
		alert('请使用手机浏览该页面，IE或包括IE内核的多核浏览器会造成一些错误！');
		// window.location.href('http://10.7.1.14/mobileweb/signin.html')
	}


	var thewindow=$(window),thedocument=$(document);
	var autoa,autob,autoc,autod;
	var louzhu = {};
	gogotop();
	//给返回顶部添加功能
	function withtimea(a){
		$.get(rootmenu+"/mobileweb/php/checkdbf/checkfile.php?sid="+a,function(data){
		$('#resultul>tbody').html(data);
		},'html');
	}
	function withtimeb(a){
		$.get(rootmenu+"/mobileweb/php/checkdbf/checkfilelme.php?sid="+a,function(data){
		$('#resultul>tbody').html(data);
		},'html');
	}

	$('#backtoTop').on('click',gogotop)
	//////////////////////////////////////
	//启动 fastclick组件
	// $(function() {  
	//     Fastclick.attach(document.body);  
	// });  
	/////////////////////////////////////////////////////////
	var color=['#fe4365','#fc9d9a','#5a0d43','#23ebba','#83af9b','#00ae9d','#ed1941','#009ad6','#78cdd1','#8552a1'];
	var rootmenu = "http://10.7.1.14";


		//进入主页获取新闻随机5条
		$.get(rootmenu+"/mobileweb/php/news/gettitle.php?a=1",function(data){
			$('#newsul').html(data);
		},'html');
		//////////////////////////////////////////////////

		//点击新闻详情获取更多发送指令获得50条
		$('#newsp').on('click',function(){

			$.get(rootmenu+"/mobileweb/php/news/gettitle.php?a=2",function(data){
				$('.icon-user').hide();
				$('.icon-undo2').show();
				$('#resultnews').show();//
				$('#content').hide();//首页
				$('#newstable').show();
				$('#newstbody').html(data);
				$('#toph1 h1').html("金属动态");
				$('#realbody').scrollTop(0);
				distancetop=0;
				//这里之前是givesupericon
				
				thedocument.on('scroll',debounce(function()
				{

						var offsettop = thedocument.scrollTop();
						var windowheight=thewindow.height();
						var tableheight= thedocument.height();
						var trnumber = $('#newstbody>tr').length;

			
						if(tableheight<=offsettop+windowheight+200)
						{
							$.ajax({ 
								    type: "POST", 	
									url:rootmenu+"/mobileweb/php/news/gettenmore.php",
									data: 
										{
											number:trnumber,
										},
									dataType:"html",
									success: function(data)
										{
											 $('#newstbody').append(data);
										},
									error: function(jqXHR)
										{     
									   		alert("发生错误：" + jqXHR.status);  
									   	},     
								})
						}
				},300));
		},'html');

		});
		/////////////////////////////////////////////////////

		//再次点击获得详细新闻信息
		$('#newstbody').on('click','tr',function(){
			thedocument.off('scroll');
			var number = this.id.slice(4);
			scrolltop=thedocument.scrollTop();
			thedocument.scrollTop(0);
			$.get(rootmenu+"/mobileweb/php/news/gettitle.php?a="+number,function(data){
				$('#newstable').hide();
				$('#realnews').show();
				$('#realnews h1').html(data.title);
				$('#realnews h4').html(data.pubdate.slice(0,10));
				$('#realnews p').html(data.content);
				$('#back2').show();
				$('#realnews').css('background-color',color[Math.round(Math.random()*10)]);
			
			},'json');
		
		})
		//////////////////////////////////////////////////////
//刷新汇率		
		var refresh = function(){
			$.get(rootmenu+"/mobileweb/php/checkdbf/connectfile.php?address=MSFX",function(data){
				 $('#ruilang').text(data[0]);
				 $('#yingbang').text(data[1]);
				 $('#riyuan').text(data[2]);
				 $('#aoyuan').text(data[3]);
				 $('#jiayuan').text(data[4]);
				 $('#ouyuan').text(data[5]);
				 $('#gangbi').text(data[6]);
				 $('#renminbi').text(data[7]);
				},'json')
			}
/////////////////////////////////////////////////////////////////////////////////
//刷新指数
		var refreshfiger = function(){
			$.get(rootmenu+"/mobileweb/php/checkdbf/connectfile2.php?address=MSID",function(data){
				 $('#meizhi').text(data[0]);
				 $('#shenzhi').text(data[1]);
				 $('#shangzhi').text(data[2]);
				 $('#hengzhi').text(data[3]);
				 $('#daozhi').text(data[4]);
				 $('#nazhi').text(data[5]);
				 $('#rizhi').text(data[6]);
				 $('#haizhi').text(data[7]);
				 $('#fazhi').text(data[8]);
				 $('#bazhi').text(data[9]);
				},'json')
			}
//////////////////////////////////////////////////////////////////////////////////
//监听滚动条，返回顶部选项
	var p,q,
		backtoTop=$('#backtoTop'),
		refreshmah=debounce(function(){
		var exchange =$('#exchangeinfo');
		if(exchange.offset().top - thedocument.scrollTop() - thewindow.height()<-40&&exchange.offset().top!=0&&exchange.offset().top!=thedocument.scrollTop())
		{
 			if(!p)
 			{	refresh();
 				p=setInterval(refresh,5000);
 			}; 	
 			if(!q)
 			{	refreshfiger();
 				q=setInterval(refreshfiger,5000);
 			}; 			
		}
		else
		{
 				clearInterval(p);
 				clearInterval(q);
    			p = null;
    			q = null;
 		};



		if(thedocument.scrollTop()<100)
		{
			backtoTop.hide();
		}
		else if(thedocument.scrollTop()>=100)
		{
			backtoTop.show();
		}

	},1000)
	thewindow.on('scroll',refreshmah);
///////////////////////////////////////////////////////////////////
//  禁止后退
    if (window.history && window.history.pushState) 
    {
     	thewindow.on('popstate', function () 
     	{
            window.history.pushState('forward', null, ''); 
            window.history.forward(1);
    	});
    }
	　　　　//在IE兼容
	    window.history.pushState('forward', null, '');  
	    window.history.forward(1);
//////////////////////////////////////////////       


//头部菜单
	$('#toplist').on('click',function(){
		$('#topmenu').animate({'left':0}).css('height',document.documentElement.clientHeight);
		$('#bkg-half').fadeIn();
		$('.icon-paragraph-justify').css({'color':'#2ad5dc'});
		$('body').css({'position':'fixed','top':0});
	});
	$('.icon-cross,#bkg-half').on('click',function(){
		$('#personinfo').animate({'right':'-300%'});
		$('#topmenu').animate({'left':'-300%'});
		$('#bkg-half').fadeOut();
		$('.icon-paragraph-justify').css({'color':'white'});
		$('body').css({'position':'relative'});

	});
	$('#menulist a').on('click',function(){
		$('#personinfo').animate({'right':'-300%'});
		$('#topmenu').animate({'left':'-300%'});
		$('#bkg-half').fadeOut();
		$('.icon-paragraph-justify').css({'color':'white'});
		$('body').css({'position':'relative'});
		$('#content').show();
		$('#result,#resultul,#resulttable,#resultnews,#newstable,#realnews,#back1,#back2,#back3,#back4').hide();
		$('#toph1 h1').html("有色金属信息查询");
		$('.icon-user').show();
		$('.icon-undo2').hide();
		$('#realbody').unbind('scroll');
		clearInterval(autoa);
		clearInterval(autob);
		clearInterval(autoc);
		clearInterval(autod);
	});
	$('.icon-user').on('click',function(){
		$('#personinfo').css({'height':document.documentElement.clientHeight,'display':'block'}).animate({'right':0});
		$('#bkg-half').fadeIn();
		$('.icon-paragraph-justify').css({'color':'#2ad5dc'});
		$('body').css({'position':'fixed','top':0});
	});
//////////////////////////////////////////////////	
//信息查询第一级
	$("#realbody a").on('click',function(){
	
		 distancetop=$('body').scrollTop();
		$('#bkg-loding').on('touchmove', function (event) {
			event.preventDefault();
		});
		$('#bkg-loding').css('overflow','hidden');
		//case1,2用
		var h1 = $(this).find("span:first-child").html();
		var address = this.id.slice(-2);
		var n = $(this).attr('value');
		/////////////
		//case3,4,5
		var dbfaddress = this.id;
		louzhu.case4=dbfaddress;
		//////////////
		$('#bkg-loding').css('display','flex');

		switch(n)
		{
			case '1':   //type1常规类型从market 和 spot price里查询的数据
				$.get(rootmenu+"/mobileweb/php/checkdb/check.php?mid="+address,function(data){
					$('#resultul>tbody').html(data);
					$('#toph1 h1').html(h1);
					$('#resultul>thead').html('<tr><td colspan="4">点击产品获取详细数据</td></tr><tr class="tr"><td>时间</td><td>类型</td><td>最高价</td><td>最低价</td></tr>');					
					firstresponse();
					$('#bkg-loding').css('display','none');
					$('body').css('overflow-y','auto');
				},'html');
				
				break; 
			case '2':   //从stock里查询 包括LME库存、成交量、未平仓
				$.get(rootmenu+"/mobileweb/php/checkdb/checktype2.php?sid="+address,function(data){
					$('#resultul>tbody').html(data);
					$('#toph1 h1').html(h1);
					switch(address)
					{
						case '01':   //LME库存
						$('#resultul>thead').html('<tr><td colspan="4">点击产品获取详细数据</td></tr><tr class="tr"><td>时间</td><td>类型</td><td>库存</td><td>增减</td></tr>');
						break;
						case '02':   //LME成交量
						case '03':   //LME未平仓
						$('#resultul>thead').html('<tr><td colspan="3">点击产品获取详细数据</td></tr><tr class="tr"><td>时间</td><td>类型</td><td>总计</tr>');
						break;
						case '99': // 伦敦定盘价专用
						$('#resultul>thead').html('<tr><td colspan="3">点击产品获取详细数据</td></tr><tr class="tr"><td>时间</td><td>类型</td><td>总计</tr>');
					}
					firstresponse();
					$('#bkg-loding').css('display','none');
					$('body').css('overflow-y','auto');
				},'html');
				break;
			case '3':     //汇率和指数
				$.get(rootmenu+"/mobileweb/php/checkdbf/ckmoney.php?sid="+dbfaddress,function(data){
					$('#resulttable>tbody').html(data);
					$('#toph1 h1').html(h1);
					firstresponse();
					$('#resulttable').show();
					$('#resultul').hide();
					$('#bkg-loding').css('display','none');
					$('body').css('overflow-y','auto');
				},'html');
				break;
			case '4':   //国际贵金属、其他市场
				$.get(rootmenu+"/mobileweb/php/checkdbf/checkfile.php?sid="+dbfaddress,function(data){
					$('#resultul>tbody').html(data);
					$('#toph1 h1').html(h1);
					$('#resultul>thead').html('<tr><td colspan="4">点击产品获取详细数据</td></tr><tr class="tr"><td colspan="2">时间</td><td>类型</td><td>最新价格</td></tr>');					
					firstresponse();
					$('#bkg-loding').css('display','none');
					$('body').css('overflow-y','auto');
					autoa = setInterval(function(){
						withtimea(louzhu.case4);
					},5000);

				},'html');
				break;
			case '6':   //LME收盘价
				$.get(rootmenu+"/mobileweb/php/checkdb/checklme.php?mid="+address,function(data){
					$('#resultul>tbody').html(data);
					$('#toph1 h1').html(h1);
					$('#resultul>thead').html('<tr><td colspan="3">点击产品获取详细数据</td></tr><tr class="tr"><td>时间</td><td>类型</td><td>收盘价</td></tr>');					
					firstresponse();
					$('#bkg-loding').css('display','none');
					$('body').css('overflow-y','auto');
				},'html');				
				break; 
			case '7':   //LME 现 、期 、官
				$.get(rootmenu+"/mobileweb/php/checkdbf/checkfilelme.php?sid="+dbfaddress,function(data){
					$('#resultul>tbody').html(data);
					$('#toph1 h1').html(h1);
					$('#resultul>thead').html('<tr><td colspan="4">点击产品获取详细数据</td></tr><tr class="tr"><td colspan="2">时间</td><td>类型</td><td>最新价格</td></tr>');					
					firstresponse();
					$('#bkg-loding').css('display','none');
					$('body').css('overflow-y','auto');
					autob = setInterval(function(){
						withtimeb(louzhu.case4);
					},5000)
				},'html');
				break;
			default:
			// alert("数据出现异常，请刷新页面后查询！	")
			break;


		}

	});
//////////////////////////////////////////////////////

//事件委托现货查询第二级
	$('#resultul>tbody').on('click','tr',function()
	{
			var verifyadress = this.id.slice(0,2);
			//t1,t2,t3用
			var resultulhead= $(this).attr('value');
			var addressmarket= this.className.slice(3);
			///t4用
			clearInterval(autoa);
			clearInterval(autob);		
			$('#realbody').scrollTop(0);
			switch(verifyadress)
			{
				case 't1':   //LME库存
					$('#back1').show();
					var address = this.id.slice(5); 
					$('#resulttable>thead').html('<tr id="resultulhead"></tr><tr id="resulttop" class="tr"><td>日期</td><td>库存</td><td>增减</td></tr>');		
					$('#resultulhead').html("<td colspan='3'>"+resultulhead+"</td>");
					$.get(rootmenu+"/mobileweb/php/checkdb/check2type2.php?pid="+address+"&sid="+addressmarket,function(data)
					{
						$('#resulttable>tbody').html(data);
					},'html');
				break;
				case 't2':    //LME未平仓、成交量
					$('#back1').show();
					var address = this.id.slice(5);
					$('#resulttable>thead').html('<tr id="resultulhead"></tr><tr id="resulttop" class="tr"><td>日期</td><td>总量</td></tr>');		
					$('#resultulhead').html("<td colspan='2'>"+resultulhead+"</td>");

					$.get(rootmenu+"/mobileweb/php/checkdb/check2type2.php?pid="+address+"&sid="+addressmarket,function(data)
					{
						$('#resulttable>tbody').html(data);
					},'html');
				break;
				case 't3':    //伦敦定盘价
					$('#back1').show();
					var address = this.id.slice(0,2);
					$('#resulttable>thead').html('<tr id="resultulhead"></tr><tr id="resulttop" class="tr"><td>日期</td><td>金(上午)</td><td>金(下午)</td><td>银</td></tr>');		
					$('#resultulhead').html("");
					$.get(rootmenu+"/mobileweb/php/checkdb/check2type2.php?pid="+address+"&sid="+address,function(data)
					{
						$('#resulttable>tbody').html(data);
					},'html');
				break;
				case 't4':    //国际贵金属 、其他市场
					$('#back3').show();
					var filename= this.id.slice(2,6);
					var filecodename = this.id.slice(6);
					var t4title = $(this).find('td:nth-child(2)').html()+$(this).find('td:first-child').html();
			
					$('#resulttable>thead').html('<tr id="resultulhead"></tr><tr id="resulttop" class="tr"><td></td><td></td></tr>');		
					$('#resultulhead').html("<td colspan='2'>"+t4title+"</td>");
					$.get(rootmenu+"/mobileweb/php/checkdbf/checkfile2.php?filename="+filename+"&codename="+filecodename,function(data){
					$('#resulttable>tbody').html(data);
						autoc = setInterval(function(){
							$.get(rootmenu+"/mobileweb/php/checkdbf/checkfile2.php?filename="+filename+"&codename="+filecodename,function(data){
							$('#resulttable>tbody').html(data);
								},'html');
						},5000)
					},'html');
				break;
				case 't7':   // LME 现 期 官
					$('#back4').show();
					var filename= this.id.slice(2,5);
					var filecodename = this.id.slice(5);
					var t4title = $(this).find('td:nth-child(2)').html()+$(this).find('td:first-child').html();			
	
					$('#resulttable>thead').html('<tr id="resultulhead"></tr><tr id="resulttop" class="tr"><td></td><td></td></tr>');		
					$('#resultulhead').html("<td colspan='2'>"+t4title+"</td>");
					$.get(rootmenu+"/mobileweb/php/checkdbf/checkfilelme.php?sid="+filename+"&filecodename="+filecodename,function(data){
					$('#resulttable>tbody').html(data);
						autod = setInterval(function(){
							$.get(rootmenu+"/mobileweb/php/checkdbf/checkfilelme.php?sid="+filename+"&filecodename="+filecodename,function(data){
							$('#resulttable>tbody').html(data);
								},'html');
						},5000)
					},'html');
				break;
				default:    //现货那一堆、上海黄金、MB、欧洲小金属、LME收盘价
					$('#back1').show();
					var address = this.id.slice(3);	
					var classname=$(this).attr('class').slice(3);	
					if(classname==13)//LME收盘价的幺蛾子
					{
					$('#resulttable>thead').html('<tr id="resultulhead"></tr><tr id="resulttop" class="tr"><td>日期</td><td>收盘价</td></tr>');		
					$('#resultulhead').html("<td colspan='2'>"+resultulhead+"</td>");
					}else{
					$('#resulttable>thead').html('<tr id="resultulhead"></tr><tr id="resulttop" class="tr"><td>日期</td><td>最高价</td><td>最低价</td></tr>');			
					$('#resultulhead').html("<td colspan='3'>"+resultulhead+"</td>");
					}
					

					$.get(rootmenu+"/mobileweb/php/checkdb/check2.php?pid="+address+"&mid="+addressmarket,function(data)
					{	
						$('#resulttable>tbody').html(data);
					},'html');
				break;
			}
			$('#resulttable').show();
			$('#resultul').hide();
	});
////////////////////////////////////////////////////////

$('#back4').on('click',function()
{
	$('#back4').hide();
	$('#resultul').fadeIn();
	$('#resulttable').hide();
	thedocument.scrollTop(0);
	$('#resulttable>thead,#resulttable>tbody').empty();
	thedocument.trigger('scroll');
	clearInterval(autod);
	autob = setInterval(function(){
		withtimeb(louzhu.case4);
	},5000);
});	
$('#back3').on('click',function()
{
	$('#back3').hide();
	$('#resultul').fadeIn();
	$('#resulttable').hide();
	thedocument.scrollTop(0);
	$('#resulttable>thead,#resulttable>tbody').empty();
	thedocument.trigger('scroll');
	clearInterval(autoc);
	autoa = setInterval(function(){
		withtimea(louzhu.case4);
	},5000);
});	
$('#back2').on('click',function()
{
	$('#back2').hide();
	$('#realnews').hide();
	$('#newstable').fadeIn();
	thedocument.scrollTop(scrolltop);
	thedocument.trigger('scroll');
	thedocument.on('scroll',debounce(function()
				{

						var offsettop = thedocument.scrollTop();
						var windowheight=thewindow.height();
						var tableheight= thedocument.height();
						var trnumber = $('#newstbody>tr').length;

			
						if(tableheight<=offsettop+windowheight+200)
						{
							$.ajax({ 
								    type: "POST", 	
									url:rootmenu+"/mobileweb/php/news/gettenmore.php",
									data: 
										{
											number:trnumber,
										},
									dataType:"html",
									success: function(data)
										{
											 $('#newstbody').append(data);
										},
									error: function(jqXHR)
										{     
									   		alert("发生错误：" + jqXHR.status);  
									   	},     
								})
						}
				},300));
});
$('#back1').on('click',function()
{
	$('#back1').hide();
	$('#resultul').fadeIn();
	$('#resulttable').hide();
	thedocument.scrollTop(0);
	$('#resulttable>thead,#resulttable>tbody').empty();
	thedocument.trigger('scroll');
});	

//滚回头部函数
function gogotop()
{
	$('body').animate({scrollTop: '0px'}, 500);
}
/////////////////////////////////////////////
//点击a标签需要作出的反应
function firstresponse()
{
	$('body').scrollTop(0).off('touchmove').css('position','relative');
	$('.icon-user').hide();
	$('.icon-undo2').show();
	$('#content').hide();
	$('#result').show();
	$('#resultul').show();


}
/////////////////////////////////////////////

//滚动加载预防抖动函数
function debounce(fn,delay){  
	var timer=null;
	return function()
		{
			var context=this;
			var args = arguments;
			clearTimeout(timer);
			timer=setTimeout(function(){
				fn.apply(context,args);
			},delay)
		};
	};
///////////////////////////////////////////////////
//返回图表绑定事件
	$('.icon-undo2').on('click',function()
		{
			$('textresult,#resultul,#resulttable,#resultnews,#newstable,#realnews,#back1,#back2,#back3,#back4').hide();
			$('#content').show();
			$('#toph1 h1').html("有色金属信息查询");
			$('.icon-user').show();
			$('.icon-undo2').hide();
			thedocument.off('scroll');
			thewindow.scrollTop(distancetop);
			$('#resultul>tbody,#resultul>thead,#resulttable>thead,#resulttable>tbody').empty();
			clearInterval(autoa);
				clearInterval(autob);
					clearInterval(autoc);
						clearInterval(autod);

		});

///////////////////////////////////////////////////
//xianshigerenxinxi
$('#showthename').on('click',function(){
	if($('.nonep').height()==0){
		$('.nonep').animate({'height':'2.5em'});
	}else{
		$('.nonep').animate({'height':'0'});
	}
});




	refresh();
	refreshfiger();
//被遗弃的左滑动 右滑动
// var leftFlag=0,rightFlag=0;

// $("body").on("swipeleft",function(){

// 	if(leftFlag==1)
// 		{
// 			$(".icon-cross").trigger('click');
// 			leftFlag=0;
// 		}
// 	else if(leftFlag==0)
// 		{

// 			$(".icon-user").trigger('click');
// 			rightFlag=1;
// 		}

// });
// $("body").on("swiperight",function(){
// 	if(rightFlag==1)
// 		{
// 			$(".icon-cross").trigger('click');
// 			rightFlag=0;

// 		}
// 	else if(rightFlag==0)
// 		{
// 			$(".icon-menu").trigger('click');
// 			leftFlag=1;
// 		}

// });

















});//document ready
	