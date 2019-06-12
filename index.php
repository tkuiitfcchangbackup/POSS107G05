<!DOCTYPE html>
<html>
<head>
<title>Mushroom Dictionary!</title>
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
</head>
<body style="background-color:black;">
<center>
<div style="width:350px;background-color:#D4E6F8;">
<table style="text-align:center;"border="1">
<tr>
<td style="width:350px;height:300px;">
<table style="border:3px #FFFFFF solid;padding:5px;" rules="all" cellpadding='5';>
<font color="black"><h2>Mushroom Dictionary</h2></font>
<h4>
  <a href="introduction.html">Introduction</a>
  <br>
  <a href="groupIntro.html">About Our Group</a>
  <br>
  <!--
  <a href="Test.html" style="display:none">Test</a>
  <br>
  -->
</h4>
<font color="black">
<h4>Search the unknown words/memes:</h4>
</font>
<form action="/POSS107G05/action_page.php" method="post">
  <font color="black" size="3">Your name:<br></font>
  <input type="text" name="searchName">
  <br>
  <font color="black" size="3">Searching word:<br></font>
  <input type="text" name="searchQuest">
  <br><br>
  <input type="submit" value="Search">
</form>
</tr>
</table>
</table>
</div>
<br><br><br>

<div style="width:350px;background-color:#D4E6F8;">
<table style="text-align:center;"border="1">
<tr>
<td style="width:350px;">
<table style="border:3px #FFFFFF solid;padding:5px;" rules="all" cellpadding='5';>
<font color="black"><h2>Search record : </h2></font>
<center id="commentArea">
<table style="border:3px #FFFFFF solid;padding:5px;" rules="all" cellpadding='5';>
<p>
<?php
$link=mysqli_connect("localhost","nicholas","12313") or die ("無法開啟Mysql資料庫連結"); //建立mysql資料庫連結
mysqli_select_db($link, "the_db"); //選擇資料庫abc
$sql = "SELECT update_time,user_id,word_req,word_trans FROM rec"; //在test資料表中選擇所有欄位
mysqli_query($link,'SET CHARACTER SET utf8');	// 送出Big5編碼的MySQL指令
mysqli_query($link,"SET collation_connection 'utf8'");
$result = mysqli_query($link,$sql); // 執行SQL查詢
$total_fields=mysqli_num_fields($result); // 取得欄位數
$total_records=mysqli_num_rows($result);  // 取得記錄數
?>
</p>
<table  border="1" align="center">
<tr>
<td>_Time_</td>
<td>_Name_</td>
<td>_Word_</td>
<td>_Result_</td>
</tr>
<?php
for ($i=0;$i<$total_records;$i++) {$row = mysqli_fetch_assoc($result); //將陣列以欄位名索引
?>
<tr>
<td><?php echo $row[update_time];?></td>
<td><?php echo $row[user_id];?></td>
<td><?php echo $row[word_req];?></td>
<td><?php echo $row[word_trans];?></td>
</tr>
<?php    }   ?>
</table>
</table>
</center>
</table>
</td>
<tr>
</table>
</center>
</body>
</html>
