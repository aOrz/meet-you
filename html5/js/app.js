(function($, owner) {

	owner.login = function(loginInfo, callback) {
		callback = callback || $.noop;
		loginInfo = loginInfo || {};
		loginInfo.userMail = loginInfo.userMail || '';
		loginInfo.userPWD = loginInfo.userPWD || '';
		loginInfo.controller = 'login';
		mui.ajax('http://172.27.35.1/meet/controller/user/user_controller.php', {
			data: loginInfo,
			dataType: 'json', //服务器返回json格式数据
			type: 'get', //HTTP请求类型
			timeout: 10000, //超时时间设置为10秒；
			success: function(data) {
				if (!data) {
					return callback('用户名或密码错误');
				}
				localStorage.setItem('userId', data);
				var state = owner.getState();
				state.userMail = loginInfo.userMail;
				state.token = "token123456789";
				owner.setState(state);
				return callback();
			},
			error: function(xhr, type, errorThrown) {
				//异常处理；
				return callback('网络错误~_~');
			}
		});
	};
	owner.saveInfo = function(saveInfo, callback) {
		callback = callback || $.noop;
		saveInfo = saveInfo || {};
		if (saveInfo.userMail.length < 5) {
			return callback('用户名最短需要 5 个字符');
		}
		if (saveInfo.userPWD.length < 6) {
			return callback('密码最短需要 6 个字符');
		}
		saveInfo.controller = 'upInfo';
		mui.ajax('http://172.27.35.1/meet/controller/user/user_controller.php', {
			data: saveInfo,
			dataType: 'json', //服务器返回json格式数据
			type: 'get', //HTTP请求类型
			timeout: 10000, //超时时间设置为10秒；
			success: function(data) {
				if (!data) {
					return callback('用户名或密码错误');
				}
				return callback('修改成功');
			},
			error: function(xhr, type, errorThrown) {
				//异常处理；
				return callback('网络错误~_~');
			}
		});
		return callback();
	}
	owner.reg = function(regInfo, callback) {
		callback = callback || $.noop;
		regInfo = regInfo || {};
		regInfo.userMail = regInfo.userMail || '';
		regInfo.userPWD = regInfo.userPWD || '';
		if (regInfo.userMail.length < 5) {
			return callback('用户名最短需要 5 个字符');
		}
		if (regInfo.userPWD.length < 6) {
			return callback('密码最短需要 6 个字符');
		}
		regInfo.controller = 'reg';
		mui.ajax('http://172.27.35.1/meet/controller/user/user_controller.php', {
			data: regInfo,
			dataType: 'json', //服务器返回json格式数据
			type: 'get', //HTTP请求类型
			timeout: 10000, //超时时间设置为10秒；
			success: function(data) {
				if (!data) {
					return callback('用户名或密码错误');
				}
				localStorage.setItem('userId', data);
				var state = owner.getState();
				state.userMail = regInfo.userMail;
				state.token = "token123456789";
				owner.setState(state);
				return callback();
			},
			error: function(xhr, type, errorThrown) {
				//异常处理；
				return callback('网络错误~_~');
			}
		});
		return callback();
	};

	owner.getState = function() {
		var stateText = localStorage.getItem('$state') || "{}";
		return JSON.parse(stateText);
	};
	owner.setState = function(state) {
		state = state || {};
		localStorage.setItem('$state', JSON.stringify(state));
		//		var settings = owner.getSettings();
		//		settings.gestures = '';
		//		owner.setSettings(settings);
	};
	owner.getInfo = function(userId, callback) {
		callback = callback || $.noop;
		userId = userId || {};
		userInfo = {};
		userInfo.userId = userId;
		userInfo.controller = 'getInfo';
		mui.ajax('http://172.27.35.1/meet/controller/user/user_controller.php', {
			data: userInfo,
			dataType: 'json', //服务器返回json格式数据
			type: 'get', //HTTP请求类型
			timeout: 10000, //超时时间设置为10秒；
			success: function(data) {
				if (!data || data == -2) {
					return callback('服务器开小差了');
				}
				accountBox.value = data.info.userMail;
				cname.value = data.info.userNickName;
				userinfo.value = data.info.userIntroduction;
				wchat.value = data.info.userWeiXin;
				school.value = data.info.userSchool;
				weibo.value = data.info.userWeiBo;
				tel.value = data.info.userTel;
				qq.value = data.info.userQq;
				sexs.value = data.info.userSex;
				return callback();
			},
			error: function(xhr, type, errorThrown) {
				//异常处理；
				return callback('网络错误~_~');
			}
		});
		return callback();
	};
	owner.delFriend = function(userId, callback) {
		callback = callback || $.noop;
		userId = userId || {};
		userInfo = {};
		userInfo.userId = userId;
		userInfo.controller = 'getInfo';
		mui.ajax('http://172.27.35.1/meet/controller/user/user_controller.php', {
			data: userInfo,
			dataType: 'json', //服务器返回json格式数据
			type: 'get', //HTTP请求类型
			timeout: 10000, //超时时间设置为10秒；
			success: function(data) {
				if (!data) {
					return callback('用户名或密码错误');
				}
				accountBox.value = data.info.userMail;
				cname.value = data.info.userNickName;
				userinfo.value = data.info.userIntroduction;
				wchat.value = data.info.userWeiXin;
				school.value = data.info.userSchool;
				weibo.value = data.info.userWeiBo;
				tel.value = data.info.userTel;
				qq.value = data.info.userQq;
				sexs.value = data.info.userSex;
				return callback();
			},
			error: function(xhr, type, errorThrown) {
				//异常处理；
				return callback('网络错误~_~');
			}
		});
		return callback();
	};
	//	owner.setSettings = function(settings) {
	//		settings = settings || {};
	//		localStorage.setItem('$settings', JSON.stringify(settings));
	//	}
	//	owner.getSettings = function() {
	//		var settingsText = localStorage.getItem('$settings') || "{}";
	//		return JSON.parse(settingsText);
	//	}
	owner.searchs = function(searchInfo, callback) {
		callback = callback || $.noop;
		searchInfo = searchInfo || '';
		search = {};
		search.nickName = searchInfo;
		search.controller = 'saerchFriend';
		mui.ajax('http://172.27.35.1/meet/controller/user/user_controller.php', {
			data: search,
			dataType: 'json', //服务器返回json格式数据
			type: 'get', //HTTP请求类型
			timeout: 10000, //超时时间设置为10秒；
			success: function(data) {
				if (!data) {
					return callback('没有找到好友');
				}
				var litView = document.getElementById('friendList');
				var popover = document.getElementById('popovers');
				litView.innerHTML = '';
				popover.innerHTML = '';
				data = eval(data);
				for (var i in data) {
					var lis = '<li class="mui-table-view-cell">' +
						'<div class="mui-slider-left mui-disabled">' +
						'<a class="mui-btn mui-btn-yellow mui-icon mui-icon-plus" onclick="addFriend(' + data[i].id + ')"></a>' +
						'</div>' +
						'<div class="mui-slider-right mui-disabled">' +
						'<a class="mui-btn mui-btn-yellow mui-icon mui-icon-plus" onclick="addFriend(' + data[i].id + ')"></a>' +
						'</div>' +

						'<div class="mui-slider-handle">' +
						'<a href="#p' + data[i].id + '" >' +
						'<img class="mui-media-object mui-pull-left" src="img/imgs.jpg">' +
						'</a>' +
						'<div class="mui-media-body">' +
						data[i].nickname +
						'<p class=\'mui-ellipsis\'>' + data[i].introduction + '</p>' +
						'</div>' +
						'</div>' +

						'</li>';
					var po = '<div id="p' + data[i].id + '" class="mui-popover">' +
						'<ul class="mui-table-view">' +
						'<li class="mui-table-view-cell">Name:' +
						data[i].nickname +
						'</li>' +
						'<li class="mui-table-view-cell">Mail:' +
						data[i].mail +
						'</li>' +
						'<li class="mui-table-view-cell">Tel:' +
						data[i].tel +
						'</li>' +
						'<li class="mui-table-view-cell">QQ:' +
						data[i].qq +
						'</li>' +
						'<li class="mui-table-view-cell">Wchat:' +
						data[i].weixin +
						'</li>' +
						'<li class="mui-table-view-cell">School:' +
						data[i].homepage +
						'</li>' +
						'</ul>' +
						'</div>';
					alert(lis);
					if (i == "num") {
						lis = '';
						po = '';
					}
					popover.innerHTML += po;
					litView.innerHTML += lis;

				}
				return callback();
			},
			error: function(xhr, type, errorThrown) {
				//异常处理；
				return callback('网络错误~_~');
			}
		});
		return callback();
	};
	owner.getAllFriend = function(searchInfo, callback) {
		callback = callback || $.noop;
		searchInfo = searchInfo || '';
		search = {};
		search.userId = searchInfo;
		search.controller = 'getAllFriend';
		mui.ajax('http://172.27.35.1/meet/controller/user/user_controller.php', {
			data: search,
			dataType: 'json', //服务器返回json格式数据
			type: 'get', //HTTP请求类型
			timeout: 10000, //超时时间设置为10秒；
			success: function(data) {
				if (!data) {
					return callback('用户名或密码错误');
				}
				var litView = document.getElementById('friendList');
				var popover = document.getElementById('popovers');
				litView.innerHTML = '';
				popover.innerHTML = '';
				data = eval(data);
				for (var i in data) {
					var lis = '<li class="mui-table-view-cell">' +
						'<div class="mui-slider-left mui-disabled">' +
						'<a class="mui-btn mui-btn-red mui-icon mui-icon-trash" onclick="delFriend(' + data[i].id + ')"></a>' +
						'<a class="mui-btn mui-btn-yellow mui-icon mui-icon-paperplane" onclick="message(' + data[i].id + ')"></a>' +
						'</div>' +
						'<div class="mui-slider-right mui-disabled">' +
						'<a class="mui-btn mui-btn-red mui-icon mui-icon-trash" onclick="delFriend(' + data[i].id + ')"></a>' +
						'<a class="mui-btn mui-btn-yellow mui-icon mui-icon-paperplane" onclick="message(' + data[i].id + ')"></a>' +
						'</div>' +

						'<div class="mui-slider-handle">' +
						'<a href="#p' + data[i].id + '" >' +
						'<img class="mui-media-object mui-pull-left" src="img/imgs.jpg">' +
						'</a>' +
						'<div class="mui-media-body">' +
						data[i].nickname +
						'<p class=\'mui-ellipsis\'>' + data[i].introduction + '</p>' +
						'</div>' +
						'</div>' +

						'</li>';
					var po = '<div id="p' + data[i].id + '" class="mui-popover">' +
						'<ul class="mui-table-view">' +
						'<li class="mui-table-view-cell">Name:' +
						data[i].nickname +
						'</li>' +
						'<li class="mui-table-view-cell">Mail:' +
						data[i].mail +
						'</li>' +
						'<li class="mui-table-view-cell">Tel:' +
						data[i].tel +
						'</li>' +
						'<li class="mui-table-view-cell">QQ:' +
						data[i].qq +
						'</li>' +
						'<li class="mui-table-view-cell">Wchat:' +
						data[i].weixin +
						'</li>' +
						'<li class="mui-table-view-cell">School:' +
						data[i].homepage +
						'</li>' +
						'</ul>' +
						'</div>';
					//	alert(po);
					if (i == "num") {
						lis = '';
						po = '';
					}
					popover.innerHTML += po;
					litView.innerHTML += lis;
				}

				return callback();
			},
			error: function(xhr, type, errorThrown) {
				//异常处理；
				return callback('网络错误~_~');
			}
		});
		return callback();
	};
	owner.getAllCircle = function(searchInfo, callback) {
		callback = callback || $.noop;
		searchInfo = searchInfo || '';
		search = {};
		search.userId = searchInfo;
		search.controller = 'searchCircleByUserId';
		mui.ajax('http://172.27.35.1/meet/controller/circle/circle_controller.php', {
			data: search,
			dataType: 'json', //服务器返回json格式数据
			type: 'get', //HTTP请求类型
			timeout: 10000, //超时时间设置为10秒；
			success: function(data) {
				if (!data) {
					return callback('服务器提了一个问题');
				}
				var litView = document.getElementById('friendList');
				litView.innerHTML = '';
				data = eval(data);
				for (var i in data) {
					var lis = '<li class="mui-table-view-cell">' +
						'<div class="mui-slider-left mui-disabled">' +
						'<a class="mui-btn mui-btn-red mui-icon mui-icon-trash" onclick="delFriend(' + data[i].id + ')"></a>' +
						'<a class="mui-btn mui-btn-yellow mui-icon mui-icon-paperplane" onclick="message(' + data[i].id + ')"></a>' +
						'</div>' +
						'<div class="mui-slider-right mui-disabled">' +
						'<a class="mui-btn mui-btn-red mui-icon mui-icon-trash" onclick="delFriend(' + data[i].id + ')"></a>' +
						'<a class="mui-btn mui-btn-yellow mui-icon mui-icon-paperplane" onclick="message(' + data[i].id + ')"></a>' +
						'</div>' +
						'<div class="mui-slider-handle">' +
						'<img class="mui-media-object mui-pull-left" src="img/imgs.jpg">' +
						'<div class="mui-media-body">' +
						data[i].nickname +
						'<p class=\'mui-ellipsis\'>' + data[i].introduction + '</p>' +
						'</div>' +
						'</div>' +
						'</li>';
					if (i == "num") {
						lis = '';
					}
					litView.innerHTML += lis;
				}

				return callback();
			},
			error: function(xhr, type, errorThrown) {
				//异常处理；
				return callback('网络错误~_~');
			}
		});
		return callback();
	};
}(mui, window.app = {}));