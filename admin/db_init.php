<?

$query ="CREATE TABLE  IF NOT EXISTS photosession (
  id INT(25) NOT NULL,
  image VARCHAR(60) NOT NULL,
  description VARCHAR(60) NOT NULL
)";
if(mysqli_query($database, $query)){
}else{
  echo  mysqli_error($database);
}

?>
