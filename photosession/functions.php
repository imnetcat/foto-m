<?
function load_all($database){
  $raw = " ";
  $query ="SELECT id, image, description FROM photosession";
  if($result = mysqli_query($database, $query)){
    while ($row = mysqli_fetch_row($result)) {
      $raw .= var_dump($row);
    }
  }
  return $raw;
}
?>
