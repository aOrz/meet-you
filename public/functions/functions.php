<?php
//header("Content-type: text/html; charset=utf-8"); 
// 启动一个CURL会话
$ch = curl_init();
// 要访问的地址
$keywords=$_GET['music'];

//$keywords=mb_convert_encoding($keywords, "utf-8", "gb2312");
$keywords=urlencode($keywords);

$keywords='URL'.$keywords;
//echo $keywords;
curl_setopt($ch, CURLOPT_URL, $keywords);
$header = array( 
'CLIENT-IP:URL/', 
'X-FORWARDED-FOR:URL/', 
); 
curl_setopt($ch, CURLOPT_HTTPHEADER, $header); 

// 从证书中检查SSL加密算法是否存在
//curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);

//模拟用户使用的浏览器，在HTTP请求中包含一个”user-agent”头的字符串。
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0)");

// 设置curl允许执行的最长秒数
//curl_setopt($ch, CURLOPT_TIMEOUT, 6);

// 获取的信息以文件流的形式返回，而不是直接输出。
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
//curl_setopt($st, CURLOPT_RETURNTRANSFER,1);
// 执行操作
 $result = curl_exec($ch);
// var_dump($result);
 //echo $result;
//  $qian=array(" ","　","\t","\n","\r");$hou=array("","","","","");
   // $result= str_replace($qian,$hou,$result);  
preg_match_all("/\<a class\=\"card\"\>.*([.\n]*)\\n.*([.\n]*)\\n.*([.\n]*)\\n.*([.\n]*)\\n.*([.\n]*)\\n.*([.\n]*)\\n.*([.\n]*)\\n.*/",$result,$matches_a);
//var_dump($matches_a);
  $num= count($matches_a[0]);
  //echo $num[0][3];
 $row =array( );
    for($i=0;$i<$num-1;$i++)
	{
		//var_dump($matches_a[0][$i]);	
	    preg_match_all("/>[^\<]*/",$matches_a[0][$i],$matches_author);
		 preg_match_all("/rel\=\"[^\"]*/",$matches_a[0][$i],$matches_url);
	//	 var_dump($matches_url);
	   // var_dump($matches_author);
		 $murl=substr ($matches_author[0][10],1);
		// $url_len=strlen($murl);
	    //var_dump($matches_author);
	    // $num[i] = {
	    // 	musicName:substr ($matches_author[0][6],1),
	    // 	author:substr ($matches_author[0][3],1),
	    // 	url:$murl
	    // }	
		 //echo substr ($matches_author[0][10],1);
		 $row[$i]['author'] = substr ($matches_author[0][3],1);
		 $row[$i]['name'] = substr ($matches_author[0][6],1);
		  $row[$i]['url'] = $murl;


	}
	 echo json_encode($row);
?>
