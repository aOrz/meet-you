<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>CINS - 图书借阅管理系统</title>

    <!-- Bootstrap core CSS -->
    <link href="../../../public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../../public/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="../../res/css/carousel.css" rel="stylesheet">
    <style type="text/css">

    </style>
  </head>
  
  <body>
    <div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <a class="navbar-brand" href="#">CINS - 图书借阅管理系统</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="../home/home.php">首页</a></li>
                <li><a href="../userInfo/userInfo.php">个人信息</a></li>
                <li><a href="../history/history.php">借阅记录</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="../../../signin/view">退出</a></li>
              </ul>
            </div>
          </div>
        </nav>

      </div>
    </div>

    <div class="container marketing" style="margin-top: 150px;">

      <div class="row" style="margin-bottom: 10%; font-size: 17px;">
        <div class="col-xs-5" style="text-align: center">
          <br><br>
          <img class="img-circle" src="../../res/img/male.png" alt="Generic placeholder image" style="width: 200px; height: 200px;">
        </div>

        <div class="col-xs-7" style="text-align: center">
          <table border="0">
            <tr>
              <td width="120px" height="80px"><b>图书条码</b></td>
              <td><div class="input-group input-group-lg"><input type="text" class="form-control input-lg" style = "width:300px" id="bookCode" >
              <input type="button"  class="btn btn-primary btn-lg" value="查找" id="search"></div></td>
            </tr>
            <tr>
              <td width="120px" height="80px"><b>图书名称</b></td>
              <td><input type="text" class="form-control input-lg" style = "width:400px" id="bookName" disabled></td>
            </tr>
            <tr>
              <td width="120px" height="80px"><b>作者</b></td>
              <td><input type="text" class="form-control input-lg" style = "width:200px" id="bookAuthor" disabled></td>
            </tr>
            <tr>
              <td width="120px" height="80px"><b>数量</b></td>
              <td><input type="text" class="form-control input-lg" style = "width:100px" id="bookQty" disabled></td>
            <tr>
            <td width="120px" height="80px"></td>
              <td><input type="button" class="btn btn-success btn-lg" value="借阅" id="borrow"></td>
            </tr>
            <input type="hidden" id="bookID" >
          </table>
        </div>
      </div>

      <footer style="text-align: center">
        <p>&copy; 2014 CINS - 图书借阅管理系统，
        <a href="http://www.lishengcn.cn" target="_blank">by lishengcn.cn</a></p>
      </footer>

    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="../../../public/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $("#search").click(function(){
      var bookCode = $("#bookCode").val();
      if (!bookCode) {
        alert("请将表单填写完整");
      } else {
        $.ajax({
          type: 'GET',
          cache: false,
          url: '../../controller/searchBorrowController.php',
          data: {
            bookcode: bookCode
          },
          success: function(data){
            if(data == false){
              alert("查找失败 :(")
            }else{
              var bookObj = jQuery.parseJSON(data);
              // console.log(bookObj);
              $("#bookName").val(bookObj.bookName);
              $("#bookAuthor").val(bookObj.bookAuthor);
              $("#bookQty").val(bookObj.bookNowQty);
              $("#bookID").val(bookObj.bookID);
            }
          }
        })
      }
    })


    $("#borrow").click(function(){
      if ($("#bookQty").val() == 0) {
        alert("借阅失败 :(");
      }else{
        $.ajax({
          type: 'GET',
          cache: false,
          url: '../../controller/borrowController.php',
          data: {
            bookid: $("#bookID").val()
          },
          success: function(data){
            alert("借阅成功 :)");
            var num = $("#bookQty").val()-1;
            $("#bookQty").val(num);

          }
        })
      }
    })
    </script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../../public/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
