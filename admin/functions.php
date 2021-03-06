<?

function add_in($database, $image, $derectory, $description, $count){
  $query = "SELECT MAX(id) FROM ".$derectory;
  if($result = mysqli_query($database, $query)){
    while ($row = mysqli_fetch_row($result)) {
      $new_id = array_pop($row) + 1;
    }
  }
  $query = "INSERT INTO $derectory ( id, image, description, count) VALUES (?,?,?,?)";
  $stmt = mysqli_prepare($database, $query);
  mysqli_stmt_bind_param($stmt, "isss", $new_id, $image, $description, $count);
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

function change($database, $id, $derectory, $image, $description, $count){
  $query = "UPDATE $derectory SET image=?, description=?, count=? WHERE id=$id";
  $stmt = mysqli_prepare($database, $query);
  mysqli_stmt_bind_param($stmt, "sss", $image, $description, $count);
  if(mysqli_stmt_execute($stmt)){
    mysqli_stmt_close($stmt);
    return "Изображение успешно изменено";
  }else{
    return "Error in: " . $query . "<br>" . mysqli_error($database);
  }
}

function get($database, $derectory){
  $items = " ";
  $query ="SELECT id, image, description, count FROM ".$derectory;
  if($result = mysqli_query($database, $query)){
    while ($row = mysqli_fetch_row($result)) {
      $items .= var_dump($row);
    }
  }
  return $items;
}

?>
