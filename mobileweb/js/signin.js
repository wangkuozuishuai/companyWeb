$(function() {  
	FastClick.attach(document.body); 

});  
var signinAddress = "http://10.7.1.14";
$('.togglesection').on('click',function()
	{
		$('#section1,#section2').toggle();
	});
function removeinfotip()
	{
		$('#infotip').html("");
	}
function unamefocus(data)
	{
		if(data.id=='signusername')
			{	
				var re=/^[a-zA-Z\d]\w{2,11}[a-zA-Z\d]$/;
				if(re.test(data.value))
				{
					$('#unamecheckp').html("");
				}
				else
				{
					$('#unamecheckp').html("*请输入4-12位英文或数字");
				}
			}
		else if(data.id=='signname') 
			{
				var re=/^[\u4e00-\u9fa5]{2,5}$/;
				if(re.test(data.value))
				{
					$('#namecheckp').html("");
				}
				else
				{
					$('#namecheckp').html("*请输入中文姓名");
				}
			}
		else if(data.id=='signmobilenumber') 
			{
				var re=/^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\d{8}$/;
				if(re.test(data.value))
				{
					$('#mpnumcheckp').html("");
				}
				else
				{
					$('#mpnumcheckp').html("*请输入11位手机号");
				}
			}
	}
function unamecheck(data)
	{
		if(data.id=='signusername')
			{
				if(data.value.length==0)
				{
					$('#unamecheckp').html("*用户名不能为空");
				}
				else
				{
					var re=/^[a-zA-Z\d]\w{2,11}[a-zA-Z\d]$/;
					if(re.test(data.value))
						{
							$('#unamecheckp').html("");
						}
					else
						{
							$('#unamecheckp').html("*请输入4-12位英文或数字");
						}
				}
			}
		else if(data.id=='signname')
			{
				if(data.value.length==0)
				{
					$('#namecheckp').html("*姓名不能为空");
				}else{
					var re=/^[\u4e00-\u9fa5]{2,5}$/;
					if(re.test(data.value))
					 {
					 	$('#namecheckp').html("");
					 }
					 else
					 {
					 	$('#namecheckp').html("*请2-5位中文姓名");
					 }
				 }
			}
		else if(data.id=='signmobilenumber')
			{
				if(data.value.length==0)
					{
						$('#mpnumcheckp').html("*手机号不能为空");
					}
					else
					{
						var re=/^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\d{8}$/;
						if(re.test(data.value))
						 {
						 	$('#mpnumcheckp').html("");
						 }
						 else
						 {
						 	$('#mpnumcheckp').html("*请输入正确11位手机号");
						 }
					}
			}
	}
/////////////////////////////////////////////////////
//注册AJAX请求
$('#realregister').on('click',function()
{
	if($('#mpnumcheckp').html()==""&&$('#namecheckp').html()==""&&$('#unamecheckp').html()=="")
	{
		$.ajax({
			type:"POST",
			url:signinAddress+"/mobileweb/php/signinout/register.php",
			data:
			{
				username:$('#signusername').val(),
				name:$('#signname').val(),
				mobilenumber:$('#signmobilenumber').val()
			},
			dataType:'html',
			success:function(result){
				if(result==1)
					{
						alert("注册成功！");
						window.location.href=signinAddress+"/mobileweb/signin.html"
					}
					else if(result==0){
						$('#mpnumcheckp').html("该手机号已被注册！");
					}
					else if(result==2){
						alert("呵呵！");
					}
			},
			error:function(data){}
		})
	}
	else
	{
		$('#mpnumcheckp').html("您输入的信息有误！");
	}
});
/////////////////////////////////////////////////////
//登陆AJAX请求		
$('#loadin').on('click',function() 
{
	if($('#username').val()!=""&&$('#mobilenumber').val()!="")
	{
		if($('#mobilenumber').val().length!=11)
		{
			$('#infotip').html("*请输入正确的手机号");
		}
		else
		{
					$.ajax({
					type:"POST",
					url:signinAddress+"/mobileweb/php/signinout/signin.php",
					data:{
						username:$('#username').val(),
						mobilenumber:$('#mobilenumber').val()
					},
					dataType:'html',
					success:function(result){
						if(result==1)
						{
							// alert("进不去哦~");
							 window.location.href=signinAddress+"/mobileweb/php/webJumping.php"
						}else{
							$('#infotip').html("用户名或手机号错误！");
						}
					},
					error:function(data){}
					})		
		}
	}
	else
	{
		$('#infotip').html("请输入用户名和手机号！");
	}
});

$('#captcha_img').on('click',function(){
	$(this).attr('src','http://10.7.1.14/mobileweb/php/captcha.php?r='+Math.random());
	});
	


