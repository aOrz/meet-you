//登陆验证
function CheckLogin() {
	var email = document.getElementById("email").value;
	var password = document.getElementById("password").value;
	if ((!email) || (!password)) {
		alert("请把信息输入完整");
	} else {
		data1 = {
			controller: "login",
			userMail: email,
			userPWD: password
		};
		$.ajax({
			url: "../controller/user/user_controller.php",
			dataType: "json",
			data: data1,
			cache: false,
			async: false,
			success: function(data) {
				if (data == 0) {
					alert("用户名或密码错误！");
				} else if (data != null) {
					//					alert("success");
					//saveStorage
					window.localStorage.setItem("userId", data);
					window.event.returnValue = false;
					window.location.href = "dynamic.html";

				}
			},
			error: function(e) {
				alert("error");
			}
		});
	}
};


//注册验证
function CheckRegister() {
	var email = document.getElementById('zc_email').value;
	var username = document.getElementById('zc_username').value;
	var phonenumber = document.getElementById("zc_phonenumber").value;
	var psw = document.getElementById("zc_psw").value;
	var psw_2 = document.getElementById('zc_psw_2').value;
	//			alert(email+"  "+username+"  "+phonenumber+"   "+psw+"  "+psw_2);
	//验证邮箱格式
	function Isyx(yx) {
		var reyx = /^([.a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
		return (reyx.test(yx));
	}
	if (!Isyx(email)) {
		alert("请输入正确的邮箱地址!");
		$("#zc_email").focus();
		return 0;
	}
	//密码长度
	if (psw.length < 6) {
		alert("密码长度不能小于六位");
		return 0;
	}
	//两次密码验证
	if (psw != psw_2) {
		alert("两次密码不同，请重新输入");
		return 0;
	}
	//昵称长度
	if (username.length > 8) {
		alert("昵称太长了~~~");
		return 0;
	}

	if (email && username && phonenumber && psw) {
		data1 = {
			userMail: email,
			userNickName: username,
			userTel: phonenumber,
			userPWD: psw,
			controller: "reg"
		};
		$.ajax({
			url: "../controller/user/user_controller.php",
			//dataType: "json",
			data: data1,
			cache: false,
			async: false,
			success: function(data) {
				if (data != null) {
					alert("注册成功");
					window.localStorage.setItem("userId", data);
					window.event.returnValue = false;
					window.location.href = "dynamic.html";
				} else {
					alert("注册失败");
				}
			},
			error: function(e) {
				alert("注册失败");
			}
		});
	} else {
		alert("请把信息输入完整");
	}
}



//首页导航信息

//个人信息
function Personal_information_ready() {
	$.ajax({
		type: "get",
		url: "../controller/user/user_controller.php",
		dataType: "json",
		async: false,
		cache: false,
		data: {
			userId: localStorage['userId'],
			controller: 'getInfo'
		},
		success: function(data) {
//			alert("sss");
			document.getElementById("cg_name").lastElementChild.innerHTML = data.info.userNickName;
			document.getElementById("cg_email").lastElementChild.innerHTML = data.info.userMail;
			document.getElementById("cg_sex").lastElementChild.innerHTML = data.info.userSex;
			document.getElementById("cg_phonenumber").lastElementChild.innerHTML = data.info.userTel;
			document.getElementById("cg_QQ").lastElementChild.innerHTML = data.info.userQq;
			document.getElementById("cg_weibo").lastElementChild.innerHTML = data.info.userWeiBo;
			document.getElementById("cg_weixin").lastElementChild.innerHTML = data.info.userWeiXin;
			document.getElementById("cg_school").lastElementChild.innerHTML = data.info.userSchool;
			document.getElementById("cg_intro").lastElementChild.innerHTML = data.info.userIntroduction;
		},
		error: function() {
			alert("获取信息失败");
		}
	});
}

//修改个人信息
var elementnames = ["cg_name",
	"cg_email", "cg_sex", "cg_phonenumber",
	"cg_QQ", "cg_weibo", "cg_weixin", "cg_school", "cg_intro"
];
var elements = ["", "", "", "", "", "", "", "", ""];
var i;
for (i = 0; i < elementnames.length; i++) {
	elements[i] = document.getElementById(elementnames[i]);
}

function Change_Information() {
	document.getElementById("cg_tx").style.display = "inline";
	for (i = 0; i < elements.length; i++) {
		elements[i].firstElementChild.style.display = "inline";
		elements[i].lastElementChild.style.display = "none";
		elements[i].firstElementChild.value = elements[i].lastElementChild.innerText;
		elements[i].firstElementChild.style.border = "1px solid #cecece";
		if (i == elements.length - 1) {
			elements[i].firstElementChild.innerText = elements[i].lastElementChild.innerText;
		}
	}
	document.getElementById("xg").style.display = "none";
	document.getElementById("save").style.display = "inline";
}

//保存个人信息
function Save_Information() {
	document.getElementById("xg").style.display = "inline";
	document.getElementById("save").style.display = "none";
	document.getElementById("cg_tx").style.display = "none";
	for (i = 0; i < elements.length; i++) {
		elements[i].firstElementChild.style.display = "none";
		elements[i].lastElementChild.style.display = "inline";
		elements[i].lastElementChild.innerText = elements[i].firstElementChild.value;
		elements[i].firstElementChild.style.border = "1px solid #cecece";
		if (i == elements.length - 1) {
			elements[i].lastElementChild.innerText = elements[i].firstElementChild.innerText;
		}
	}
	$.ajax({
		type: "get",
		url: "../controller/user/user_controller.php",
		dataType: "json",
		async: false,
		cache: false,
		data: {
		userNickName:document.getElementById("cg_name").firstElementChild.value,
		userSchool:document.getElementById("cg_school").firstElementChild.value,
		userSex:document.getElementById("cg_sex").firstElementChild.value,
		userMail:document.getElementById("cg_email").firstElementChild.value,
		userTel:document.getElementById("cg_phonenumber").firstElementChild.value,
		userQq:document.getElementById("cg_QQ").firstElementChild.value,
		userWeiXin:document.getElementById("cg_weixin").firstElementChild.value,
		userIntroduction:document.getElementById("cg_intro").firstElementChild.value,
		userWeiBo:document.getElementById("cg_weibo").firstElementChild.value,
		controller:"upInfo"
		},
		success: function(data) {
			if(data)
			{alert("修改成功");}
			else
			{alert("修改失败,请重新修改");}
		},
		error: function() {
			alert("获取信息失败");
		}
	});
}

