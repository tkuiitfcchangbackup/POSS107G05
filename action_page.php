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

<div style="width:350px;background-color:#D4E6F8;text-align:center;">
<table border="1">
<tr>
<td style="width:350px;">
<table style="border:3px #FFFFFF solid;padding:5px;" rules="all" cellpadding='5';>
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

if (empty($p)){
$p="Word not found...";
}

?>


<?php
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
</table>
</td>
</tr>
</table>
</div>
<br>


<div style="width:350px;background-color:#D4E6F8;text-align:center;">
<table border="1">
<tr>
<td style="width:350px;">
<table style="border:3px #FFFFFF solid;padding:5px;" rules="all" cellpadding='5';>
<?php

echo "<h2>Meaning:</h2><br> ".$p;

$from="<div class=\"example\">";
$end="</div>";
$q=cut($contents, $from, $end);
$p=strip_tags($q);
if (empty($p)){
$p="Word not found...";
}
echo "<br><br><h2>Example:</h2><br> ".$p;

$from="<div class=\"contributor\">";
$end="</div>";
$q=cut($contents, $from, $end);
$p=strip_tags($q);
if (empty($p)){
$p="Word not found...";
}
echo "<br><br><h2>Contributor:</h2><br> ".$p."<br>";
?>
</table>
</td>
</tr>
</table>
</div>
<br>

<div style="width:350px;background-color:#D4E6F8;text-align:center;">
<table border="1">
<tr>
<td style="width:350px;">
<table style="border:3px #FFFFFF solid;padding:5px;" rules="all" cellpadding='5';>
<br>
<a href="index.php"><h3>>>BACK TO FRONT PAGE<<</h3></a>
<br>
</table>
</td>
</tr>
</table>
</div>
</center>
</body>
</html>
