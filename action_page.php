<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
</head>
<body style="background-color:black;">
<center>
<div style='text-align:center'>
<div style="width:350px;background-color:#D4E6F8;">
<?php
$search=$_POST["searchQuest"];
$u_name=$_POST["searchName"];

$servername = "localhost";
$username = "nicholas";
$password = "12313";
$dbname = "the_db";

$Brah="https://www.urbandictionary.com/define.php?term=".$search;
$brah=str_replace(" ","+",$Brah);

$url = $brah;
$contents = file_get_contents($url);
//如果出現中文亂碼使用下面程式碼
//$getcontent = iconv("gb2312", "utf-8",$contents);
//echo $contents;
$from="<div class=\"meaning\">";
$end="</div>";
function cut($file,$from,$end){
$message=explode($from,$file);
$message=explode($end,$message[1]);
return $message[0];
}
$q=cut($contents, $from, $end);
$p=strip_tags($q);

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO rec (user_id, word_req, word_trans)
VALUES ('$u_name', '$search', '$p')";

if (mysqli_query($conn, $sql)) {
    echo "<br><br>";
    echo "The word you are looking for 👀 is : ";
    echo "<h2>".$search."</h2><br>";
} else {
    echo "Error: ".$sql."<br>".mysqli_error($conn);
}

mysqli_close($conn);

?>
</div>
</center>
<a href="index.php"><h3>>>BACK TO FRONT PAGE<<</h3></a>
<br>
<br>

<center>
<div style="width:350px;background-color:#D4E6F8;">
<table border="1">
<tr>
<td style="width:350px;">
<table style="border:3px #FFFFFF solid;padding:5px;" rules="all" cellpadding='5';>
<?php

echo $p;

$from="<div class=\"example\">";
$end="</div>";
$q=cut($contents, $from, $end);
$p=strip_tags($q);
echo "<br><br>".$p;

$from="<div class=\"contributor\">";
$end="</div>";
$q=cut($contents, $from, $end);
$p=strip_tags($q);
echo "<br><br>".$p;
?>
</table>
</td>
</tr>
</table>
</div>
</center>

<br>
<br>
<br>
<a href="index.php"><h3>>>BACK TO FRONT PAGE<<</h3></a>
</div>

</body>
</html>
