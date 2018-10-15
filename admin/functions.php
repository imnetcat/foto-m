<?

function add_in_shop($database, $image, $type, $stone, $technology, $cost, $filter_5, $description){
  $query = "SELECT MAX(id) FROM shop";
  if($result = mysqli_query($database, $query)){
    while ($row = mysqli_fetch_row($result)) {
      $new_id = array_pop($row) + 1;
    }
  }
  $query = "INSERT INTO shop (id, image, type, stone, technology, cost, filter_5, description) VALUES (?,?,?,?,?,?,?,?)";
  $stmt = mysqli_prepare($database, $query);
  mysqli_stmt_bind_param($stmt, "isssssss", $new_id, $image, $type, $stone, $technology, $cost, $filter_5, $description);
  if(mysqli_stmt_execute($stmt)){
    mysqli_stmt_close($stmt);
    return "Изображение успешно добавлено!";
  }else{
    return "Error in: " . $query . "<br>" . mysqli_error($database);
  }
}

function add_in_archive($database, $image, $type, $stone, $technology, $cost, $filter_5, $description){
  $query = "SELECT MAX(id) FROM archive";
  if($result = mysqli_query($database, $query)){
    while ($row = mysqli_fetch_row($result)) {
      $new_id = array_pop($row) + 1;
    }
  }
  $query = "INSERT INTO archive (id, image, type, stone, technology, cost, filter_5, description) VALUES (?,?,?,?,?,?,?,?)";
  $stmt = mysqli_prepare($database, $query);
  mysqli_stmt_bind_param($stmt, "isssssss", $new_id, $image, $type, $stone, $technology, $cost, $filter_5, $description);
  if(mysqli_stmt_execute($stmt)){
    mysqli_stmt_close($stmt);
    return "Изображение успешно добавлено!";
  }else{
    return "Error in: " . $query . "<br>" . mysqli_error($database);
  }
}

function delete($database, $id, $derectory){
  $query = "DELETE FROM ".$derectory." WHERE id=".$id;
  if($result = mysqli_query($database, $query)){ 
    return "Изображение номер ". $id . " удалено успешно";
  } else {
    return "Error in: " . $query . "<br>" . mysqli_error($database);
  }
}

function change($database, $id, $derectory, $image, $type, $stone, $technology, $cost, $filter_5, $description){
  $query = "UPDATE $derectory SET image=?, type=?, stone=?, technology=?, cost=?, filter_5=?, description=? WHERE id=$id";
  $stmt = mysqli_prepare($database, $query);
  mysqli_stmt_bind_param($stmt, "sssssss", $image, $type, $stone, $technology, $cost, $filter_5, $description);
  if(mysqli_stmt_execute($stmt)){
    mysqli_stmt_close($stmt);
    return "Изображение успешно изменено";
  }else{
    return "Error in: " . $query . "<br>" . mysqli_error($database);
  }
}

function get_shop($database){
  $items = " ";
  $query ="SELECT id, image, type, stone, technology, cost, filter_5, description  FROM shop";
  if($result = mysqli_query($database, $query)){
    while ($row = mysqli_fetch_row($result)) {
      $items .= var_dump($row);
    }
  }
  return $items;
}

function get_archive($database){
  $items = " ";
  $query ="SELECT id, image, type, stone, technology, cost, filter_5, description  FROM archive";
  if($result = mysqli_query($database, $query)){
    while ($row = mysqli_fetch_row($result)) {
      $items .= var_dump($row);
    }
  }
  return $items;
}

?>
