function init() {
		$.ajax({
			type: "GET",
			url: "../controller/user/user_controller.php",
			data: {
				controller: 'getInfo',
				userId: localStorage.getItem('userId')
			},
			success: function(data) {
				//			alert(data)
				localStorage.setItem('userInfo', data);
				data = eval('(' + data + ')');
				document.getElementById('side_name').innerHTML = data.info.userNickName;
				document.getElementById('side_intro').innerHTML = data.info.userIntroduction;

			}
		})
		$.ajax({
					type: "GET",
					url: "../controller/mood/mood_controller.php",
					data: {
						userId: localStorage['userId'],
						controller: 'GetMoodByPage',
						page: 1
					},
					success: function(data) {
						data = eval('(' + data + ')');
							for (var i in data) {
								data[i].moods = data[i].moods.replace("@","<br/>");
								var html = '<div class = "desc">'+
									'<div class = "thumb">'+
									'<img src = "img/flower.png"/>'+
									'</div>'+
								'<div class="details">'+
									'<p>'+
										'<time>'+data[i].indate+'</time >'+
									'<br/> '+data[i].moods+'<br/>'+
									'</p>'+
								'</div>'+
									'</div>';
				$('#daily').append(html);
			}
		}
	});
}
init();
function dailySub(){
	var  now = new Date();
				var title =  '心情小记';
				var text = $('#dailyCon').val();
				if (!title || !text) {
					alert("写完了再存呀~_~");
					return 0;
				}
				Info2 = {};
				Info2.userId = localStorage.getItem('userId');
				
				Info2.controller = 'SaveMood';
				Info2.moods = title + '@' + text;
				$.ajax('../controller/mood/mood_controller.php', {
					data: Info2,
					dataType: 'json', //服务器返回json格式数据
					type: 'get', //HTTP请求类型
					success: function(data) {
						//alert(data)
						if (!data) {
							alert('请求失败');
						}
						alert('心情存好了');
						history.go(0);
					},
					error: function(xhr, type, errorThrown) {
						//异常处理；
						alert('服务器错误');
					}
				});
}
