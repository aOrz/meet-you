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
    <div class="navbar-wrapper" style="position: fixed">
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
                <li class="active"><a href="#">借阅记录</a></li>
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
        <div class="col-xs-3" style="text-align: center">
          <br><br>
          <img class="img-circle" src="../../res/img/male.png" alt="Generic placeholder image" style="width: 200px; height: 200px;">
        </div>

        <div class="col-xs-9">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>日期</th>
                <th>行为</th>
                <th>图书名称</th>
              </tr>
            </thead>
            <tbody id="history">
            </tbody>
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
    $(document).ready(function(){
      $.ajax({
        type: 'GET',
        url: '../../controller/historyController.php',
        success: function(data){
          // $("#history").empty();
          // console.log(data);

        var historyJson = jQuery.parseJSON(data);

        for(var i = 0; i < historyJson.length; i++){

          var content = "<tr><td>"+historyJson[i].hid+"</td>"+
                  "<td>"+historyJson[i].htime+"</td>"+
                  "<td>"+historyJson[i].htype+"</td>"+
                  "<td>"+historyJson[i].hbname+"</td></tr>"

                  $("#history").append(content);
                }
        }
      })
    })
    </script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../../public/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
