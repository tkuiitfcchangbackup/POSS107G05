<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
</head>
<body>
<div style='text-align:center'>
<?php
$search=$_POST["searchQuest"];
//取得當下時間並寫入資料庫(只是為了排序用)
$today = getdate();
date("Y-m-d H:i");  //日期格式化
$year = $today["year"]; //年
$month = $today["mon"]; //月
$day = $today["mday"];  //日
$hours = $today["hours"];  //時
$minutes = $today["minutes"];  //分
$seconds = $today["seconds"];  //秒

$today_date=$year."-".$month."-".$day;
$today_time=$hours.":".$minutes.":".$seconds;

$conn = mysql_connect("localhost","root","posspo11");
mysql_select_db("the_db");


echo "<br><br>";
echo "The word you are looking for 👀 is : ";
echo "<h2>".$search."</h2>";
echo "<br>";
$Brah="https://www.urbandictionary.com/define.php?term=".$search;
$brah=str_replace(" ","+",$Brah);
?>
<a href="index.html"><h3>>>BACK TO FRONT PAGE<<</h3></a>
<br>
</div>
<?php
$url=$brah;
$ch=curl_init();
$timeout=5;
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$lines_string=curl_exec($ch);
curl_close($ch);
echo "$lines_string";

?>
<div style='text-align:center'>
<br>
<br>
<br>
<a href="index.html">Brah~</a>
</div>
</body>
