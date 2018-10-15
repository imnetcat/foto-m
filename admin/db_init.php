<?
include "db.php";

$query ="CREATE TABLE  IF NOT EXISTS shop (
  id INT(50) NOT NULL,
  image VARCHAR(60) NOT NULL,
  type VARCHAR(60) NOT NULL,
  stone VARCHAR(60) NOT NULL,
  technology VARCHAR(60) NOT NULL,
  cost VARCHAR(60) NOT NULL,
  filter_5 VARCHAR(60) NOT NULL,
  description VARCHAR(1000) NULL
)";
if(mysqli_query($database, $query)){
}else{
  echo  mysqli_error($database);
}
$query ="CREATE TABLE  IF NOT EXISTS archive (
  id INT(50) NOT NULL,
  image VARCHAR(60) NOT NULL,
  type VARCHAR(60) NOT NULL,
  stone VARCHAR(60) NOT NULL,
  technology VARCHAR(60) NOT NULL,
  cost VARCHAR(60) NOT NULL,
  filter_5 VARCHAR(60) NOT NULL,
  description VARCHAR(1000) NULL
)";
if(mysqli_query($database, $query)){
}else{
  echo  mysqli_error($database);
}

?>
