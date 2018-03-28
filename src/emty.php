<?php      

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$servername = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);
// Create connection
$conn = new mysqli($servername, $username, $password, $db);

$dbName = "deanproject";
mysql_select_db($dbName); /*added semi-colon*/
$result_t = mysql_query("SHOW TABLES");
while($row = mysql_fetch_assoc($result_t))
{
   mysql_query("TRUNCATE " . $row['Tables_in_' . $dbName]);
}
?>
