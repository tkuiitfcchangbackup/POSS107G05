<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
</head>
<body>
<div style='text-align:center'>
<?php
$search=$_POST["searchQuest"];
$u_name=$_POST["searchName"];
$s_result="zErO";

$servername = "localhost";
$username = "nicholas";
$password = "12313";
$dbname = "the_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO rec (user_id, word_req, word_trans)
VALUES ('$u_name', '$search', '$s_result')";

if (mysqli_query($conn, $sql)) {
    echo "<br><br>";
    echo "The word you are looking for 👀 is : ";
    echo "<h2>".$search."</h2><br>";
    $Brah="https://www.urbandictionary.com/define.php?term=".$search;
    $brah=str_replace(" ","+",$Brah);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>

<a href="index.html"><h3>>>BACK TO FRONT PAGE<<</h3></a>
<br>
<br>

<?php
$url=$brah;
//$ch=curl_init();
//$timeout=5;
//curl_setopt($ch, CURLOPT_URL, $url);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
//$lines_string=curl_exec($ch);
//curl_close($ch);
//echo "$lines_string";

$fp = file_get_contents($url);
preg_match_all("/<div class=\"meaning\">.*?<\/div>/", $fp, $match);

if (count($match[0])>0) {
    逐筆印出
    foreach ($match[0] as $key => $value) {
        echo $value;
    }
}else{
	echo "無資料";
}

//$html = "<b>bold text</b><a href=howdy.html>click me</a>";

//preg_match_all("/(<([\w]+)[^>]*>)(.*?)(<\/\\2>)/", $html, $matches, PREG_SET_ORDER);

//foreach ($matches as $val) {
    //echo "matched: " . $val[0] . "\n";
    //echo "part 1: " . $val[1] . "\n";
    //echo "part 2: " . $val[2] . "\n";
    //echo "part 3: " . $val[3] . "\n";
    //echo "part 4: " . $val[4] . "\n\n";
//}
?>

<br>
<br>
<br>
<a href="index.html">Brah~</a>
</div>
</body>
</html>
