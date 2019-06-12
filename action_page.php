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
?>
<!--

$con = mysql_connect("localhost","nicholas","12313");
if(!$con){
  die('Could not connect: '.mysql_error());
}

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
VALUES ('John', 'Doe', 'marry')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);


mysql_select_db('the_db', $con);

mysql_query("INSERT INTO `rec` (`user_id`,`word_req`,`word_trans`)
VALUES ('{$u_name}', '{$search}', '{$s_result}')");

mysql_close($con);
-->
<?php
echo "<br><br>";
echo "The word you are looking for 👀 is : ";
echo "<h2>".$search."</h2><br>";
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
