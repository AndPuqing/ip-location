<?php
 $db=new mysqli("puqing.ooo","s6158219","<password>","s6158219");//建立SQL语句，参量为SQL数据库地址，账号，密码，数据库名
 $ip=$_SERVER["REMOTE_ADDR"];//获取IP
 $showtime=date("Y-m-d H:i:s");//获取时间
 $content = file_get_contents("http://api.map.baidu.com/location/ip?ak=y3tSmGcChrWKAhyCqbylwq4xTRuT6VPi&ip={$ip}&coor=bd09ll");//百度的api
 $json = json_decode($content);//获取返回数据
 $x=$json->{'content'}->{'point'}->{'x'};//解析数据
 $y=$json->{'content'}->{'point'}->{'y'};//解析数据
 echo 'log:',$json->{'content'}->{'point'}->{'x'};//提取经度数据
 echo '<br/>';
 echo 'lat:',$json->{'content'}->{'point'}->{'y'};//提取纬度数据
 echo '<br/>';
 print $json->{'content'}->{'address'};//提取address数据
 echo '<br/>';
 echo 'Ip:',$ip;
 echo '<br/>';
 echo 'Date:',$showtime;
 echo '<br/>';
 $agent=$_SERVER["HTTP_USER_AGENT"];//获取UA
 echo $agent,'<br/>';
 if($db){
	echo "Connection Succeeded";
	echo '<br/>';
 }else{
	echo "error";
	echo '<br/>';
 }
 $s="insert into data(time,ip,x,y,agent) values('{$showtime}','{$ip}','{$x}','{$y}','{$agent}')";//SQL语句
 $r=$db ->query($s);
 if($r){
  echo "Submitted Successfully";
  echo '<br/>';
 }
 else{
  echo "error";
  echo '<br/>';
 } 
 echo '<br/>';
 echo '此定位采用IP定位方式';
?>
