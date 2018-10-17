<?

function add_in($database, $image, $derectory, $description){
  $query = "SELECT MAX(id) FROM ".$derectory;
  if($result = mysqli_query($database, $query)){
    while ($row = mysqli_fetch_row($result)) {
      $new_id = array_pop($row) + 1;
    }
  }
  $query = "INSERT INTO $derectory ( id, image, description) VALUES (?,?,?)";
  $stmt = mysqli_prepare($database, $query);
  mysqli_stmt_bind_param($stmt, "iss", $new_id, $image, $description);
  if(mysqli_stmt_execute($stmt)){
    mysqli_stmt_close($stmt);
    return "Изображение успешно добавлено!";
  }else{
    return "Error in: " . $query . "<br>" . mysqli_error($database);
  }
}

function delete($database, $id, $derectory){
  $query = "DELETE FROM $derectory WHERE id=".$id;
  if($result = mysqli_query($database, $query)){ 
    return "Изображение номер ". $id . " удалено успешно";
  } else {
    return "Error in: " . $query . "<br>" . mysqli_error($database);
  }
}

function change($database, $id, $derectory, $image, $description){
  $query = "UPDATE $derectory SET image=?, description=? WHERE id=$id";
  $stmt = mysqli_prepare($database, $query);
  mysqli_stmt_bind_param($stmt, "ss", $image, $description);
  if(mysqli_stmt_execute($stmt)){
    mysqli_stmt_close($stmt);
    return "Изображение успешно изменено";
  }else{
    return "Error in: " . $query . "<br>" . mysqli_error($database);
  }
}

function get($database, $derectory){
  $items = " ";
  $query ="SELECT id, image, description FROM ".$derectory;
  if($result = mysqli_query($database, $query)){
    while ($row = mysqli_fetch_row($result)) {
      $items .= var_dump($row);
    }
  }
  return $items;
}

?>
