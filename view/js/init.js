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
			localStorage.setItem('userInfo',data);
			data = eval('(' + data + ')');
			document.getElementById('side_name').innerHTML = data.info.userNickName;
			document.getElementById('side_intro').innerHTML = data.info.userIntroduction;
		
		}
	})
}
init();