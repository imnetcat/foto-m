<?
if ($_SERVER['SERVER_NAME'] != "localhost") {
	$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
	$host = $url["host"];
	$username = $url["user"];
	$password = $url["pass"];
	$db = substr($url["path"], 1);
	$database = mysqli_connect($host, $username, $password, $db);
}else{
	$host = 'localhost';
	$username = 'root';
	$password = '';
	$db = 'users';
	$database = mysqli_connect($host, $username, $password, $db);
}
mysqli_query($database, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
mysqli_query($database, "SET CHARACTER SET 'utf8'");
?>
